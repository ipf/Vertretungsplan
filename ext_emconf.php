<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "vertretungsplan".
 *
 * Auto generated 28-05-2013 09:20
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Vertretungsplan',
	'description' => 'Parses and displays StandIn Plans',
	'category' => 'plugin',
	'author' => 'Ingo Pfennigstorf',
	'author_email' => 'i.pfennigstorf@gmail.com',
	'shy' => '',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '2.0.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-4.7.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:88:{s:13:"composer.json";s:4:"ef0a";s:13:"composer.lock";s:4:"bbb6";s:12:"ext_icon.gif";s:4:"0cef";s:17:"ext_localconf.php";s:4:"750c";s:14:"ext_tables.php";s:4:"7afc";s:14:"ext_tables.sql";s:4:"213e";s:28:"Classes/Contrib/autoload.php";s:4:"9887";s:46:"Classes/Contrib/composer/autoload_classmap.php";s:4:"fc1e";s:48:"Classes/Contrib/composer/autoload_namespaces.php";s:4:"c5aa";s:42:"Classes/Contrib/composer/autoload_real.php";s:4:"2ec6";s:40:"Classes/Contrib/composer/ClassLoader.php";s:4:"9fc6";s:39:"Classes/Contrib/composer/installed.json";s:4:"ac4a";s:79:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/CHANGELOG.md";s:4:"29b3";s:80:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/composer.json";s:4:"550b";s:82:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/CssSelector.php";s:4:"7ad4";s:74:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/LICENSE";s:4:"1fb1";s:83:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/phpunit.xml.dist";s:4:"6301";s:76:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/README.md";s:4:"086f";s:76:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Token.php";s:4:"e614";s:80:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Tokenizer.php";s:4:"7e0f";s:82:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/TokenStream.php";s:4:"7da2";s:80:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/XPathExpr.php";s:4:"bf7b";s:82:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/XPathExprOr.php";s:4:"98dd";s:95:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Exception/ParseException.php";s:4:"1435";s:86:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Node/AttribNode.php";s:4:"3c6d";s:85:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Node/ClassNode.php";s:4:"fe22";s:96:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Node/CombinedSelectorNode.php";s:4:"f173";s:87:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Node/ElementNode.php";s:4:"752c";s:88:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Node/FunctionNode.php";s:4:"322c";s:84:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Node/HashNode.php";s:4:"8676";s:89:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Node/NodeInterface.php";s:4:"bcca";s:82:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Node/OrNode.php";s:4:"5257";s:86:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Node/PseudoNode.php";s:4:"3a2b";s:92:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Tests/CssSelectorTest.php";s:4:"361d";s:90:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Tests/TokenizerTest.php";s:4:"02b5";s:90:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Tests/XPathExprTest.php";s:4:"002d";s:96:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Tests/Node/AttribNodeTest.php";s:4:"e854";s:95:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Tests/Node/ClassNodeTest.php";s:4:"2cdd";s:106:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Tests/Node/CombinedSelectorNodeTest.php";s:4:"73dc";s:97:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Tests/Node/ElementNodeTest.php";s:4:"002e";s:98:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Tests/Node/FunctionNodeTest.php";s:4:"5da6";s:94:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Tests/Node/HashNodeTest.php";s:4:"8286";s:92:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Tests/Node/OrNodeTest.php";s:4:"cf96";s:96:"Classes/Contrib/symfony/css-selector/Symfony/Component/CssSelector/Tests/Node/PseudoNodeTest.php";s:4:"942d";s:77:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/CHANGELOG.md";s:4:"2fb0";s:78:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/composer.json";s:4:"f73c";s:76:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Crawler.php";s:4:"c99b";s:73:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Form.php";s:4:"3231";s:86:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/FormFieldRegistry.php";s:4:"6c5c";s:72:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/LICENSE";s:4:"1fb1";s:73:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Link.php";s:4:"fed6";s:81:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/phpunit.xml.dist";s:4:"67ea";s:74:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/README.md";s:4:"fbdf";s:90:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Field/ChoiceFormField.php";s:4:"b816";s:88:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Field/FileFormField.php";s:4:"2cc9";s:84:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Field/FormField.php";s:4:"d4d9";s:89:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Field/InputFormField.php";s:4:"d945";s:92:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Field/TextareaFormField.php";s:4:"d0ad";s:86:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Tests/CrawlerTest.php";s:4:"e359";s:83:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Tests/FormTest.php";s:4:"34e8";s:83:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Tests/LinkTest.php";s:4:"a4bb";s:100:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Tests/Field/ChoiceFormFieldTest.php";s:4:"0faf";s:98:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Tests/Field/FileFormFieldTest.php";s:4:"77e2";s:94:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Tests/Field/FormFieldTest.php";s:4:"55c9";s:98:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Tests/Field/FormFieldTestCase.php";s:4:"933f";s:99:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Tests/Field/InputFormFieldTest.php";s:4:"0fa2";s:102:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Tests/Field/TextareaFormFieldTest.php";s:4:"a249";s:92:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Tests/Fixtures/no-extension";s:4:"2205";s:97:"Classes/Contrib/symfony/dom-crawler/Symfony/Component/DomCrawler/Tests/Fixtures/windows-1250.html";s:4:"974f";s:46:"Classes/Contrib/wa72/htmlpagedom/composer.json";s:4:"e1c5";s:40:"Classes/Contrib/wa72/htmlpagedom/LICENSE";s:4:"433a";s:49:"Classes/Contrib/wa72/htmlpagedom/phpunit.xml.dist";s:4:"6056";s:54:"Classes/Contrib/wa72/htmlpagedom/phpunit_bootstrap.php";s:4:"3601";s:42:"Classes/Contrib/wa72/htmlpagedom/README.md";s:4:"9e93";s:62:"Classes/Contrib/wa72/htmlpagedom/Tests/HtmlPageCrawlerTest.php";s:4:"1f91";s:55:"Classes/Contrib/wa72/htmlpagedom/Tests/HtmlPageTest.php";s:4:"bc0f";s:66:"Classes/Contrib/wa72/htmlpagedom/src/Wa72/HtmlPageDom/HtmlPage.php";s:4:"6883";s:73:"Classes/Contrib/wa72/htmlpagedom/src/Wa72/HtmlPageDom/HtmlPageCrawler.php";s:4:"d4d4";s:40:"Classes/Controller/StandInController.php";s:4:"5f50";s:45:"Classes/Provider/StandInProviderInterface.php";s:4:"503a";s:34:"Classes/Provider/UntisProvider.php";s:4:"4c21";s:37:"Classes/ViewHelpers/RawViewHelper.php";s:4:"2ce4";s:38:"Configuration/TypoScript/constants.txt";s:4:"3422";s:34:"Configuration/TypoScript/setup.txt";s:4:"22e4";s:30:"Documentation/Manual/ChangeLog";s:4:"a8c9";s:31:"Documentation/Manual/Manual.rst";s:4:"9fce";s:40:"Resources/Private/Language/locallang.xml";s:4:"07d6";s:46:"Resources/Private/Templates/StandIn/Index.html";s:4:"4a57";}',
	'suggests' => array(
	),
);

?>