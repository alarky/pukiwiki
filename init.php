<?php
// PukiWiki - Yet another WikiWikiWeb clone.
// $Id: init.php,v 1.20.2.12 2004/06/24 13:59:21 henoheno Exp $
/////////////////////////////////////////////////

// ����ե�����ξ��
define("INI_FILE","./pukiwiki.ini.php");

//** ������� **

ini_set('error_reporting', 5);
define("S_VERSION","1.3.7");
define("S_COPYRIGHT","<strong>\"PukiWiki\" ".S_VERSION."</strong> Copyright &copy; 2001-2004 <a href=\"http://pukiwiki.org\">PukiWiki Developers Team</a>. License is <a href=\"http://www.gnu.org/\">GNU/GPL</a>.<BR>Based on \"PukiWiki\" 1.3 by <a href=\"http://factage.com/sng/\">sng</a>");
define("UTIME",time());

/////////////////////////////////////////////////
// ������� (�������ѿ�)
foreach (array('HTTP_USER_AGENT','PHP_SELF','SERVER_NAME','SERVER_SOFTWARE','SERVER_ADMIN') as $key) {
	define($key, array_key_exists($key,$HTTP_SERVER_VARS) ? $HTTP_SERVER_VARS[$key] : '');
}

define("MUTIME",getmicrotime());

if($script == "") {
	$script = get_script_uri();
	if ($script === FALSE or (php_sapi_name() == 'cgi' and !is_url($script,TRUE))) {
		die_message("get_script_uri() failed: Please set \$script at INI_FILE manually.");
	}
}

$WikiName = '[A-Z][a-z]+(?:[A-Z][a-z]+)+';

//$BracketName = '\[\[(:?[^\s\]#&<>":]+:?)\]\]';
$BracketName = '\[\[(?!\/|\.\/|\.\.\/)(:?[^\s\]#&<>":]+:?)\]\](?<!\/\]\])';

$InterWikiName = "\[\[(\[*[^\s\]]+?\]*):(\[*[^>\]]+?\]*)\]\]";

$LinkPattern = "/( (?# <1>:all)
	(?# url )
	(?:\[\[([^\]]+):)?           (?#<2>:alias)
		(\[)?                      (?#<3>:open bracket)
			((?:https?|ftp|news)(?::\/\/[!~*'();\/?:\@&=+\$,%#\w.-]+)) (?#<4>:url)
		(?(3)\s([^\]]+)\])         (?#<5>:alias, close bracket if <3>)
	(?(2)\]\])                   (?# close bracket if <2>)
	|
	(?# mailto)
	(?:\[\[([^\]]+):)?           (?#<6>alias)
		([\w.-]+@[\w-]+\.[\w.-]+)  (?#<7>:mailto>)
	(?(6)\]\])                   (?# close bracket if <6>)
	|
	(?# BracketName or InterWikiName)
	(\[\[                        (?#<8>:all)
		(?:
			(\[\[)?                  (?#<9>:open bracket)
			([^\[\]]+)               (?#<10>:alias)
			(?:(?:&gt;)|>)           (?# '&gt;' or '>')
		)?
		(?:
			(\[\[)?                  (?#<11>:open bracket)
			(:?[^\s\[\]#&<>\":]*?:?) (?#<12>BracketName)
			((?(9)\]\]|(?(11)\]\])))?(?#<13>:close bracket if <9> or <11>)
			(\#(?:[a-zA-Z][\w-]*)?)? (?#<14>anchor)
			(?(13)|(?(9)\]\]|(?(11)\]\]))) (?#close bracket if <9> or <11> but !<13>)
			|
			(\[\[)?                  (?#<15>:open bracket)
			(\[*?[^\s\]]+?\]*?)      (?#<16>InterWiki)
			((?(9)\]\]|(?(15)\]\])))?(?#<17>:close bracket if <9> or <15>)
			(\:.*?)                  (?#<18>param)
			(?(17)|(?(9)\]\]|(?(15)\]\]))) (?#close bracket if <9> or <15> but !<17>)
		)?
	\]\])
	|
	(?# WikiNmae)
	($WikiName)                  (?#<19>:all)
	)/x";

//** �����ͤ����� **

$cookie = $HTTP_COOKIE_VARS;

if(get_magic_quotes_gpc())
{
	foreach($HTTP_GET_VARS as $key => $value) {
		$get[$key] = stripslashes($HTTP_GET_VARS[$key]);
	}
	foreach($HTTP_POST_VARS as $key => $value) {
		$post[$key] = stripslashes($HTTP_POST_VARS[$key]);
	}
	foreach($HTTP_COOKIE_VARS as $key => $value) {
		$cookie[$key] = stripslashes($HTTP_COOKIE_VARS[$key]);
	}
}
else {
	$post = $HTTP_POST_VARS;
	$get = $HTTP_GET_VARS;
}

// �������餯���ѿ��򥵥˥�����
$get    = sanitize_null_character($get);
$post   = sanitize_null_character($post);
$cookie = sanitize_null_character($cookie);

if($post["msg"])
{
	$post["msg"] = preg_replace("/((\x0D\x0A)|(\x0D)|(\x0A))/","\n",$post["msg"]);
}
if($get["page"]) $get["page"] = rawurldecode($get["page"]);
if($post["word"]) $post["word"] = rawurldecode($post["word"]);
if($get["word"]) $get["word"] = rawurldecode($get["word"]);

$vars = array_merge($post,$get);

$arg = rawurldecode((getenv('QUERY_STRING') != '')?
		    getenv('QUERY_STRING') :
		    $HTTP_SERVER_VARS["argv"][0]);

$arg = sanitize_null_character($arg);

//** ������� **
$update_exec = "";
$content_id = 0;

// �ե������ɤ߹���
$die = FALSE; $message = '';
foreach(array('INI_FILE', 'LANG_FILE') as $file){
	if (!file_exists(constant($file)) || !is_readable(constant($file))) {
		$die = TRUE;
		$message = "${message}File is not found. ($file)\n";
	} else {
		require(constant($file));
	}
}
if ($die) { die_message(nl2br("\n\n" . $message . "\n")); }


// �ե������ޡ�����$line_rules�˲ä���
if ($usefacemark) { $line_rules += $facemark_rules; }

$user_rules = array_merge($str_rules,$line_rules);

$note_id = 1;
$foot_explain = array();

// INI_FILE: $script: �������
if (!isset($script) or $script == '') {
	$script = get_script_uri();
	if ($script === FALSE or (php_sapi_name() == 'cgi' and !is_url($script,TRUE))) {
		die_message("get_script_uri() failed: Please set \$script at INI_FILE manually.");
	}
}

// �ǥ��쥯�ȥ�Υ����å�
$die = FALSE; $message = $temp = '';

foreach(array('DATA_DIR', 'DIFF_DIR', 'BACKUP_DIR', 'CACHE_DIR') as $dir){
        if(!is_writable(constant($dir))) {
                $die = TRUE;
                $temp = "${temp}Directory is not found or not writable ($dir)\n";
        }
}
if ($temp) { $message = "$temp\n"; }

// ����ե�������ѿ������å�
$temp = '';
foreach(array('rss_max', 'page_title', 'note_hr', 'related_link', 'show_passage',
        'rule_related_str', 'load_template_func') as $var){
        if (!isset(${$var})) { $temp .= "\$$var\n"; }
}
if ($temp) {
        $die = TRUE;
        $message = "${message}Variable(s) not found: (Maybe the old *.ini.php?)\n" . $temp . "\n";
}

$temp = '';
foreach(array('LANG', 'PLUGIN_DIR') as $def){
        if (!defined($def)) $temp .= "$def\n";
}
if ($temp) {
        $die = TRUE;
        $message = "${message}Define(s) not found: (Maybe the old *.ini.php?)\n" . $temp . "\n";
}

if($die){ die_message(nl2br("\n\n" . $message)); }

// ɬ�ܤΥڡ�����¸�ߤ��ʤ���С����Υե�������������
$pages = array($defaultpage, $whatsnew, $interwiki);
foreach($pages as $page){
	if (!file_exists(get_filename(encode($page)))) { touch(get_filename(encode($page))); }
}

$ins_date = date($date_format,UTIME);
$ins_time = date($time_format,UTIME);
$ins_week = "(".$weeklabels[date("w",UTIME)].")";

$now = "$ins_date $ins_week $ins_time";

?>
