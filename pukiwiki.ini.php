<?php
// PukiWiki - Yet another WikiWikiWeb clone
// $Id: pukiwiki.ini.php,v 1.111.2.4 2005/03/27 13:56:17 henoheno Exp $
//
// PukiWiki �ᥤ������ե�����

/////////////////////////////////////////////////
// ��ǽ���˴ؤ�������

// PKWK_OPTIMISE - ���ǤϤ��뤬���䤹�������å���ٹ���ά����
//   ����PukiWiki�˴ؤ���ư���ǧ�򽪤��Ƥ���ʤ�� '1' �ˡ�
//   ����PukiWiki�������ȥ�֥�������Ƥ���ʤ�� '0' �ˤ��Ʋ�����
if (! defined('PKWK_OPTIMISE'))
	define('PKWK_OPTIMISE', 0);

/////////////////////////////////////////////////
// �������ƥ�����

// PKWK_READONLY - Web�֥饦����ͳ���Խ�����ƥʥ󥹤�ػߤ���
//   ��­: �����󥿡��ط��ε�ǽ��ư��ޤ�
//         (counter�ץ饰����attach�ץ饰����Υ�����ȵ�ǽ�ʤ�)
if (! defined('PKWK_READONLY'))
	define('PKWK_READONLY', 0); // 0 or 1

// PKWK_SAFE_MODE - �����Ĥ��ΰ����Ǥʤ�(�������ߴ����Τ���)��ǽ��ػߤ���
if (! defined('PKWK_SAFE_MODE'))
	define('PKWK_SAFE_MODE', 0);

// PKWK_QUERY_STRING_MAX
//   GET�᥽�åɤκ���Ĺ�����¤��뤳�Ȥˤ�ꡢ�����Υ����륹(���)
//   ����Υ���������ľ���˶ػߤ���
//   ���: �ڡ���̾��ź�եե�����̾��­����Ĺ������礭��ɬ�פ�����ޤ�
//        (page-name + attach-file-name) <= PKWK_QUERY_STRING_MAX
define('PKWK_QUERY_STRING_MAX', 640); // Bytes, 0 = OFF

/////////////////////////////////////////////////
// ���� / ���󥳡��ǥ�������������

// LANG - ��������ƥ�Ĥθ������ ('en', 'ja', or ...)
define('LANG', 'ja');

// UI_LANG - ��˥塼��ܥ���ʤɤ˻Ȥ���������
define('UI_LANG', LANG); // 'en' for Internationalized wikisite

/////////////////////////////////////////////////
// �ǥ��쥯�ȥ�ط������ꤽ��1
// ('/' �ǽ���äƤ��뤳�ȡ��ѡ��ߥå����� '777')

// index.php �������� DATA_HOME ���ͤ��ѹ����뤳�Ȥˤ��
// �����Υǥ��쥯�ȥ��Web�֥饦�����鱣�����Ȥ��Ǥ��ޤ�

define('DATA_DIR',      DATA_HOME . 'wiki/'     ); // �ǿ���wiki�ƥ�����
define('DIFF_DIR',      DATA_HOME . 'diff/'     ); // �ǿ���diff(ľ���Υǡ���)
define('BACKUP_DIR',    DATA_HOME . 'backup/'   ); // �Хå����åץǡ���
define('CACHE_DIR',     DATA_HOME . 'cache/'    ); // ����å���ǡ���
define('UPLOAD_DIR',    DATA_HOME . 'attach/'   ); // ź�եե�����ȥ�
define('COUNTER_DIR',   DATA_HOME . 'counter/'  ); // counter�ץ饰����Υ�
define('TRACKBACK_DIR', DATA_HOME . 'trackback/'); // TrackBack�Υ�
define('PLUGIN_DIR',    DATA_HOME . 'plugin/'   ); // �ץ饰�����������

/////////////////////////////////////////////////
// �ǥ��쥯�ȥ�ط������ꤽ��2 ('/' �ǽ���äƤ��뤳��)

// ������ / �������륷���Ȥ��Ǽ������
define('SKIN_DIR', 'skin/');
//  ���Υǥ��쥯�ȥ�ʲ��Υ�����ե����� (*.php) ��PukiWiki����¦
//  (DATA_HOME/SKIN_DIR) ��ɬ�פǤ�����CSS�ե�����(*.css) �����
//  JavaScript�ե�����( *.js) ��Web�֥饦�����鸫������
//  (index.php ���鸫�� ./SKIN_DIR �ˤ�������)�����֤��Ʋ�����

// ��Ū�ʲ����ե�������Ǽ������
define('IMAGE_DIR', 'image/');
//  ���Υǥ��쥯�ȥ�ʲ������ƤΥե������Web�֥饦�����鸫����
//  ���(index.php ���鸫�� ./IMAGE_DIR �ˤ�������)�����֤���
//  ������

/////////////////////////////////////////////////
// ��������֤�����

switch (LANG) { // �ޤ��ϻ��ꤹ��
case 'ja':
	define('ZONE', 'JST');
	define('ZONETIME', 9 * 3600); // JST = GMT + 9
	break;
default  :
	define('ZONE', 'GMT');
	define('ZONETIME', 0);
	break;
}

/////////////////////////////////////////////////
// ���ʤ���Wiki�����Ȥ�̾�� (��̿̾���Ʋ�����)
// �����ͤ�RSS�ե����ɤΥ����ͥ�̾�ʤɤˤ�Ȥ��ޤ�
$page_title = 'PukiWiki';

// ����PukiWiki��URL (�ǥե����:��ưȽ��)
//$script = 'http://example.com/pukiwiki/';

// $script��û������: �ե�����̾������� (�ǥե����:�������ʤ�)
//$script_directory_index = 'index.php';

// �����ȴ����Ԥ�̾�� (���ѹ����Ʋ�����)
$modifier = 'anonymous';

// �����ȴ����Ԥ�Web�ڡ��� (���ѹ����Ʋ�����)
$modifierlink = 'http://pukiwiki.example.com/';

// �ڡ���̾��
$defaultpage  = 'FrontPage';     // �ȥåץڡ��� / ����Υڡ���
$whatsnew     = 'RecentChanges'; // �ѹ����줿�ڡ����ΰ���
$whatsdeleted = 'RecentDeleted'; // ������줿�ڡ����ΰ���
$interwiki    = 'InterWikiName'; // InterWiki�������Ԥ��ڡ���
$menubar      = 'MenuBar';       // ��˥塼

/////////////////////////////////////////////////
// �ǥե���Ȥ� DTD(Document Type Definition) ���ѹ�����

// �����Ĥ���Web�֥饦���������Ƥ���Х����ޤ���/����� Java���ץ�åȤ�
// Strict �Ǥʤ�DTD���׵᤹�뤫�⤷��ޤ��󡣤����Ĥ��Υץ饰����(paint
// �ʤ�)�Ϥ����ͤ� PKWK_DTD_XHTML_1_0_TRANSITIONAL ���ѹ����ޤ�

//$pkwk_dtd = PKWK_DTD_XHTML_1_1; // �ǥե����
//$pkwk_dtd = PKWK_DTD_XHTML_1_0_STRICT;
//$pkwk_dtd = PKWK_DTD_XHTML_1_0_TRANSITIONAL;
//$pkwk_dtd = PKWK_DTD_HTML_4_01_STRICT;
//$pkwk_dtd = PKWK_DTD_HTML_4_01_TRANSITIONAL;

/////////////////////////////////////////////////

// PKWK_ALLOW_JAVASCRIPT - JavaScript�����Ѥ����/�ػߤ���
define('PKWK_ALLOW_JAVASCRIPT', 0);

/////////////////////////////////////////////////
// TrackBack ��ǽ

// �ȥ�å��Хå���ͭ���ˤ���
$trackback = 0;

// �ȥ�å��Хå��ΰ������̲��̤�ɽ������ (JavaScript�����Ѥ���)
$trackback_javascript = 0;

/////////////////////////////////////////////////
// ��ե���ΰ�����ɽ������
$referer = 0;

/////////////////////////////////////////////////
// WikiName���Ф��뼫ư��󥯵�ǽ�� *̵����* ����
$nowikiname = 0;

/////////////////////////////////////////////////
// AutoLink ��ǽ

// AutoLink ���оݤȤ���ڡ���̾�κ���Х���Ĺ (0 = ̵��)
$autolink = 8;

/////////////////////////////////////////////////
// ��� / ����� ��ǽ
$function_freeze = 1;

/////////////////////////////////////////////////
// ����Wiki�����Ȥδ����ԥѥ����

// *�ѹ����Ʋ�����*
$adminpass = '1a1dc91c907325c69271ddf0c944bc72'; // md5('pass')

// = ��� =
//
// �����ԥѥ���ɤ�MD5�ϥå���η��Ǽ�갷���ޤ���
// ���ꤹ����ˡ�Ȥ��Ƥϡ�PHP�� md5() �ؿ����Ѥ�����ˡ�ȡ�
// MD5�ϥå�������ӻ��Ф������η�̤��Ѥ�����ˡ����
// ��ޤ������ʤ�������ԥ塼�������˽�ʬ����Ƥ���
// �ΤǤ���С���Ԥ򤪴��ᤷ�ޤ���
//
// ----
//
// �㤨�Хѥ���ɤ򲾤ˡ�pass�פȤ����硢�ʲ����ͤ˵��Ҥ���
// ���Ȥ��Ǥ��ޤ���
//
// $adminpass = md5('pass');	// PHP�� md5() �ؿ���Ȥ���ˡ
//
// ��������������ˡ�Ǥϡ���������ե�������������뤳�Ȥ��Ǥ���
// (�Ǥ���) ï���ˡ��ѥ���ɤ��Τ�Τ��Τ���⤤������
// ����ޤ������δ����򲼤��뤿��ˡ�md5() �ؿ��η�̤�����
// ���Ҥ��뤳�Ȥ��Ǥ��ޤ���
//
// MD5�ؿ��η��(�ϥå���)��0����9�ο����ȡ�A����F�ޤǤαѻ�
// ����ʤ�32ʸ����ʸ����ǡ����ξ�������Ǥϸ���ʸ�����
// ��¬���뤳�ȤϺ���Ǥ���
//
// // MD5�ϥå���Τߤ�Ȥ���ˡ
// $adminpass = '1a1dc91c907325c69271ddf0c944bc72';
//
// ����'pass' ��MD5�ϥå���򻻽Ф���ˤϡ�Linux��cygwin�Ǥ����
//    $ echo -n 'pass' | md5sum
// ���ͤˤ��ƻ��Ф�������Ǥ��ޤ���('-n' ���ץ�����˺�줺��!)
// FreeBSD�ʤɤǤ�md5sum�������md5���ޥ�ɤ�ȤäƤ���������
//
// ������Ǥ��ޤ��󤬡�PukiWiki�� 'md5�ץ饰����' �Ǥ⻻�Ф���ǽ
// �Ǥ���
// http://<���֤������>/index.php?plugin=md5
// ����URL�˥����������뤳�Ȥǡ�MD5�ϥå���򻻽Ф��뤿��β�
// �̤�ɽ������ޤ��������������ε�ǽ�����Ѥ����硢���ʤ���
// �����פ����ѥ���ɤ��ͥåȥ���򤽤Τޤ�ή����ǽ����
// ���뤿�ᡢ(1)���ʤ����ȤäƤ��륳��ԥ塼����(2)�����С���
// �ǤΥͥåȥ����(3)�����С� �Τ����줫������Ǥ��ʤ��Τ�
// ����С�������ˡ�ϻȤ�ʤ��ǲ�������

/////////////////////////////////////////////////
// �ڡ���̾���ɤߤ��ʤ�Ĥ��뵡ǽ �˴ؤ�������
// (�ڡ����������¤ӽ�����������뤿��ˡ�������̾�ޤ���Υڡ���
//  ̾�ˤĤ��ơ���ưŪ���ɤߤ��ʤ���������)

// ChaSen �ޤ��� KAKASHI ���ޥ�ɤ�Ȥä��ɤߤ��ʤ����뵡ǽ��
// ͭ���ˤ��� (1:ͭ��, 0:̵��)
$pagereading_enable = 0;

// ����С���������ꤹ��: ChaSen('chasen'), KAKASI('kakasi'), �ʤ�('none')
$pagereading_kanji2kana_converter = 'none';

// �����Ϥ��ǡ����Υ��󥳡��ǥ��󥰤���ꤹ��
$pagereading_kanji2kana_encoding = 'EUC'; // Default for Unix
//$pagereading_kanji2kana_encoding = 'SJIS'; // Default for Windows

// ����С����������Хѥ� (ChaSen)
$pagereading_chasen_path = '/usr/local/bin/chasen';
//$pagereading_chasen_path = 'c:\progra~1\chasen21\chasen.exe';

// ����С����������Хѥ� (KAKASI)
$pagereading_kakasi_path = '/usr/local/bin/kakasi';
//$pagereading_kakasi_path = 'c:\kakasi\bin\kakasi.exe';

// �ɤߤ��ʤ��Ǽ����ڡ���̾
$pagereading_config_page = ':config/PageReading';

// ����С��������֤ʤ�('none')�פǤ�����˻Ȥ��롢������ɤ�
// ���ʤ���᤿�ڡ���̾
$pagereading_config_dict = ':config/PageReading/dict';

/////////////////////////////////////////////////
// �桼�������
$auth_users = array(
	'foo'	=> 'foo_passwd',
	'bar'	=> 'bar_passwd',
	'hoge'	=> 'hoge_passwd',
);

/////////////////////////////////////////////////
// ǧ����ˡ

// 'pagename' : �ڡ���̾�ˤ��ǧ�ڤ�Ԥ�
// 'contents' : �ڡ��������Ƥˤ��ǧ�ڤ�Ԥ�
$auth_method_type = 'contents';

/////////////////////////////////////////////////
// ����ǧ�� (0:̵����1:ͭ��)
$read_auth = 0;

// ����ǧ�ڤ򤫤��뤿�������ɽ��
$read_auth_pages = array(
	'#�Ҥ������ۤ�#'	=> 'hoge',
	'#(�ͥ��Х�|�ͤ��Ф�)#'	=> 'foo,bar,hoge',
);

/////////////////////////////////////////////////
// �Խ�ǧ�� (0:̵����1:ͭ��)
$edit_auth = 0;

// �Խ�ǧ�ڤ򤫤��뤿�������ɽ��
$edit_auth_pages = array(
	'#Bar�θ�������#'	=> 'bar',
	'#�Ҥ������ۤ�#'	=> 'hoge',
	'#(�ͥ��Х�|�ͤ��Ф�)#'	=> 'foo',
);

/////////////////////////////////////////////////
// ����ǧ��
// 0: ̵�� (�����ػߤǤ���ڡ��������Ƥ⸡������)
// 1: ͭ�� (���Υ桼�����˵��Ĥ���Ƥ���ڡ����Τߤ򸡺�����)
$search_auth = 0;

/////////////////////////////////////////////////
// $whatsnew: RecentChanges�κ�����ܿ�
$maxshow = 60;

// $whatsdeleted: RecentDeleted�κ�����ܿ� (0 = ̵��)
$maxshow_deleted = 60;

/////////////////////////////////////////////////
// �Խ���ػߤ���ڡ���̾
$cantedit = array( $whatsnew, $whatsdeleted );

/////////////////////////////////////////////////
// HTTP: Last-Modified �إå�����Ϥ���
$lastmod = 0;

/////////////////////////////////////////////////
// ���դΥե����ޥå�
$date_format = 'Y-m-d';

// ���֤Υե����ޥå�
$time_format = 'H:i:s';

/////////////////////////////////////////////////
// RSS�ե����ɤκ�����ܿ�
$rss_max = 15;

/////////////////////////////////////////////////
// �Хå����å״ط�������

// �Хå����å׵�ǽ��ͭ���ˤ���
$do_backup = 1;

// �ڡ�����������줿���ˡ����ΥХå����åפ������뤫?
$del_backup = 0;

// �Хå����åפδֳ֤�����
$cycle  =   3; // �����֤��Ȥ˥Хå����åפ��뤫 (0 = ��˹Ԥ�)
$maxage = 120; // ������ޤǤΥХå����åפ���¸���뤫

// ����: $cycle x $maxage / 24 = �ǡ����򼺤��ޤǤκ�û����
//          3   x   120   / 24 = 15

// �Хå����åץǡ�������Ȥ���ڤ�ʸ���� (���: �ѹ�����Τϴ�������!)
define('PKWK_SPLITTER', '>>>>>>>>>>');

/////////////////////////////////////////////////
// ����������٤˼¹Ԥ��륳�ޥ��
$update_exec = '';
//$update_exec = '/usr/bin/mknmz --media-type=text/pukiwiki -O /var/lib/namazu/index/ -L ja -c -K /var/www/wiki/';

/////////////////////////////////////////////////
// �ץ��������� (TrackBack�ʤɤ��Ѥ���)

// ¾�Υ����Ȥ���ǡ��������뤿���HTTP�ץ��������С����ͳ����
$use_proxy = 0;

$proxy_host = 'proxy.example.com';
$proxy_port = 8080;

// �١����å�ǧ�ڤ�Ԥ�
$need_proxy_auth = 0;
$proxy_auth_user = 'username';
$proxy_auth_pass = 'password';

// �ץ��������С���ɬ�פȤ��ʤ��ۥ���
$no_proxy = array(
	'localhost',	// localhost
	'127.0.0.0/8',	// loopback
//	'10.0.0.0/8'	// private class A
//	'172.16.0.0/12'	// private class B
//	'192.168.0.0/16'	// private class C
//	'no-proxy.com',
);

////////////////////////////////////////////////
// �Żҥ᡼���Ϣ������

// �ڡ���������������٤˥᡼�������
$notify = 0;

// ��ʬ�ǡ����Τߤ�����
$notify_diff_only = 1;

// SMTP �����С� (Windows�Ķ��Τߡ��̾�� php.ini ���������Ƥ���)
$smtp_server = 'localhost';

// ����(To:)��������(From:)
$notify_to   = 'to@example.com';	// To:
$notify_from = 'from@example.com';	// From:

// Subject: ($page = �������줿�ڡ�����̾�����ִ������)
$notify_subject = '[PukiWiki] $page';

// �᡼��إå�
$notify_header = "From: $notify_from\r\n" .
	'X-Mailer: PukiWiki/' .  S_VERSION . ' PHP/' . phpversion();

/////////////////////////////////////////////////
// �Żҥ᡼��: POP / APOP Before SMTP

// �᡼����������� POP/APOP ǧ�ڤ�Ԥ�
$smtp_auth = 0;

$pop_server = 'localhost';
$pop_port   = 110;
$pop_userid = '';
$pop_passwd = '';

// POP���Ѥ���APOP���Ѥ��� (�⤷�����С����б����Ƥ����)
//   Default = ��ư (��ǽ�ʤ�APOP���Ѥ���)
//   1       = ��� APOP ���Ѥ���
//   0       = ���  POP ���Ѥ���
// $pop_auth_use_apop = 1;

/////////////////////////////////////////////////
// ̵�뤹��ڡ����Υꥹ��

// ̵�뤹��ڡ���������ɽ��
$non_list = '^\:';

// ̵�뤹��ڡ����򸡺����뤫�ɤ���
$search_non_list = 1;

/////////////////////////////////////////////////
// �ƥ�ץ졼�Ȥ�����

$auto_template_func = 1;
$auto_template_rules = array(
	'((.+)\/([^\/]+))' => '\2/template'
);

/////////////////////////////////////////////////
// ���Ф��˴���η����ǥ��󥫡�(����)��ư��������
$fixed_heading_anchor = 1;

/////////////////////////////////////////////////
// �������Ѥߥƥ����ȡפ�����Ƭ�Υ��ڡ����������
$preformat_ltrim = 1;

/////////////////////////////////////////////////
// ���Ԥ� <br /> �������ִ�����
$line_break = 0;

/////////////////////////////////////////////////
// �桼�������������������
//
// �⤷���å�����ƥ�Ĥ�ޤ��Wiki�����ȤȤ����Ȥ߹��ߥ֥饦����
// ���ݡ��Ȥ�����̵���ΤǤ���С�'keitai' �˴ؤ�����������ƺ��
// (�ʤ��������ȥ�����)���Ʋ�������
//
// �⤷keitai���������Ѥ��������Ǥ�Wiki�����ȤȤ������Ѥ������Τ�
// ����С� keitai.ini.php �� default.ini.php �˥��ԡ�������Ȥ�
// �ǥ����ȥå�PC�����˥������ޥ������Ʋ�������

$agents = array(
// pattern: A regular-expression that matches device(browser)'s name and version
// profile: A group of browsers

    // Embedded browsers (Rich-clients for PukiWiki)

	// Windows CE (Microsoft(R) Internet Explorer 5.5 for Windows(R) CE)
	// Sample: "Mozilla/4.0 (compatible; MSIE 5.5; Windows CE; sigmarion3)" (sigmarion, Hand-held PC)
	array('pattern'=>'#\b(?:MSIE [5-9]).*\b(Windows CE)\b#', 'profile'=>'default'),

	// ACCESS "NetFront" / "Compact NetFront" and thier OEM, expects to be "Mozilla/4.0"
	// Sample: "Mozilla/4.0 (PS2; PlayStation BB Navigator 1.0) NetFront/3.0" (PlayStation BB Navigator, for SONY PlayStation 2)
	// Sample: "Mozilla/4.0 (PDA; PalmOS/sony/model crdb/Revision:1.1.19) NetFront/3.0" (SONY Clie series)
	// Sample: "Mozilla/4.0 (PDA; SL-A300/1.0,Embedix/Qtopia/1.1.0) NetFront/3.0" (SHARP Zaurus)
	array('pattern'=>'#^(?:Mozilla/4).*\b(NetFront)/([0-9\.]+)#',	'profile'=>'default'),

    // Embedded browsers (Non-rich)

	// Windows CE (the others)
	// Sample: "Mozilla/2.0 (compatible; MSIE 3.02; Windows CE; 240x320 )" (GFORT, NTT DoCoMo)
	array('pattern'=>'#\b(Windows CE)\b#', 'profile'=>'keitai'),

	// ACCESS "NetFront" / "Compact NetFront" and thier OEM
	// Sample: "Mozilla/3.0 (AveFront/2.6)" ("SUNTAC OnlineStation", USB-Modem for PlayStation 2)
	// Sample: "Mozilla/3.0(DDIPOCKET;JRC/AH-J3001V,AH-J3002V/1.0/0100/c50)CNF/2.0" (DDI Pocket: AirH" Phone by JRC)
	array('pattern'=>'#\b(NetFront)/([0-9\.]+)#',	'profile'=>'keitai'),
	array('pattern'=>'#\b(CNF)/([0-9\.]+)#',	'profile'=>'keitai'),
	array('pattern'=>'#\b(AveFront)/([0-9\.]+)#',	'profile'=>'keitai'),
	array('pattern'=>'#\b(AVE-Front)/([0-9\.]+)#',	'profile'=>'keitai'), // The same?

	// NTT-DoCoMo, i-mode (embeded Compact NetFront) and FOMA (embedded NetFront) phones
	// Sample: "DoCoMo/1.0/F501i", "DoCoMo/1.0/N504i/c10/TB/serXXXX" // c�ʹߤϲ���
	// Sample: "DoCoMo/2.0 MST_v_SH2101V(c100;TB;W22H12;serXXXX;iccxxxx)" // ()����ϲ���
	array('pattern'=>'#^(DoCoMo)/([0-9\.]+)#',	'profile'=>'keitai'),

	// Vodafone's embedded browser
	// Sample: "J-PHONE/2.0/J-T03"	// 2.0��"�֥饦����"�С������
	// Sample: "J-PHONE/4.0/J-SH51/SNxxxx SH/0001a Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0"
	array('pattern'=>'#^(J-PHONE)/([0-9\.]+)#',	'profile'=>'keitai'),

	// Openwave(R) Mobile Browser (EZweb, WAP phone, etc)
	// Sample: "OPWV-SDK/62K UP.Browser/6.2.0.5.136 (GUI) MMP/2.0"
	array('pattern'=>'#\b(UP\.Browser)/([0-9\.]+)#',	'profile'=>'keitai'),

	// Opera, dressing up as other embedded browsers
	// Sample: "Mozilla/3.0(DDIPOCKET;KYOCERA/AH-K3001V/1.4.1.67.000000/0.1/C100) Opera 7.0" (Like CNF at 'keitai'-mode)
	array('pattern'=>'#\bDDIPOCKET\b.+\b(Opera) ([0-9\.]+)\b#',	'profile'=>'keitai'),

	// Planetweb http://www.planetweb.com/
	// Sample: "Mozilla/3.0 (Planetweb/v1.07 Build 141; SPS JP)" ("EGBROWSER", Web browser for PlayStation 2)
	array('pattern'=>'#\b(Planetweb)/v([0-9\.]+)#', 'profile'=>'keitai'),

	// DreamPassport, Web browser for SEGA DreamCast
	// Sample: "Mozilla/3.0 (DreamPassport/3.0)"
	array('pattern'=>'#\b(DreamPassport)/([0-9\.]+)#',	'profile'=>'keitai'),

	// Palm "Web Pro" http://www.palmone.com/us/support/accessories/webpro/
	// Sample: "Mozilla/4.76 [en] (PalmOS; U; WebPro)"
	array('pattern'=>'#\b(WebPro)\b#',	'profile'=>'keitai'),

	// ilinx "Palmscape" / "Xiino" http://www.ilinx.co.jp/
	// Sample: "Xiino/2.1SJ [ja] (v. 4.1; 153x130; c16/d)"
	array('pattern'=>'#^(Palmscape)/([0-9\.]+)#',	'profile'=>'keitai'),
	array('pattern'=>'#^(Xiino)/([0-9\.]+)#',	'profile'=>'keitai'),

	// SHARP PDA Browser (SHARP Zaurus)
	// Sample: "sharp pda browser/6.1[ja](MI-E1/1.0) "
	array('pattern'=>'#^(sharp [a-z]+ browser)/([0-9\.]+)#',	'profile'=>'keitai'),

	// WebTV
	array('pattern'=>'#^(WebTV)/([0-9\.]+)#',	'profile'=>'keitai'),

    // Desktop-PC browsers

	// Opera (for desktop PC, not embedded) -- See BugTrack/743 for detail
	// NOTE: Keep this pattern above MSIE and Mozilla
	// Sample: "Opera/7.0 (OS; U)" (not disguise)
	// Sample: "Mozilla/4.0 (compatible; MSIE 5.0; OS) Opera 6.0" (disguise)
	array('pattern'=>'#\b(Opera)[/ ]([0-9\.]+)\b#',	'profile'=>'default'),

	// MSIE: Microsoft Internet Explorer (or something disguised as MSIE)
	// Sample: "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)"
	array('pattern'=>'#\b(MSIE) ([0-9\.]+)\b#',	'profile'=>'default'),

	// Mozilla Firefox
	// NOTE: Keep this pattern above Mozilla
	// Sample: "Mozilla/5.0 (Windows; U; Windows NT 5.0; ja-JP; rv:1.7) Gecko/20040803 Firefox/0.9.3"
	array('pattern'=>'#\b(Firefox)/([0-9\.]+)\b#',	'profile'=>'default'),

    	// Loose default: Including something Mozilla
	array('pattern'=>'#^([a-zA-z0-9 ]+)/([0-9\.]+)\b#',	'profile'=>'default'),

	array('pattern'=>'#^#',	'profile'=>'default'),	// Sentinel
);
?>
