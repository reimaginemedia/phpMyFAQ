<?php
/**
* $Id: add.php,v 1.4 2004-12-11 21:41:30 thorstenr Exp $
*
* This is the page there a user can add a FAQ record.
*
* @author       Thorsten Rinne <thorsten@phpmyfaq.de>
* @since        2002-09-16
* @copyright    (c) 2001-2004 Thorsten Rinne
*
* The contents of this file are subject to the Mozilla Public License
* Version 1.1 (the "License"); you may not use this file except in
* compliance with the License. You may obtain a copy of the License at
* http://www.mozilla.org/MPL/
*
* Software distributed under the License is distributed on an "AS IS"
* basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the
* License for the specific language governing rights and limitations
* under the License.
*/

Tracking("newentrypage",0);

if (isset($_GET["question"])) {
    $question = strip_tags($_REQUEST["question"]);
    $readonly = " readonly=\"readonly\"";
} else {
	$question = "";
    $readonly = "";
}

if (isset($_GET["cat"]) && is_numeric($_GET["cat"])) {
	$category = $_GET["cat"];
} else {
	$category = "";
}

$tree->buildTree();

$tpl->processTemplate ("writeContent", array(
				"msgNewContentHeader" => $PMF_LANG["msgNewContentHeader"],
                "msgNewContentAddon" => $PMF_LANG["msgNewContentAddon"],
				"writeSendAdress" => $_SERVER["PHP_SELF"]."?".$sids."action=save",
				"msgNewContentName" => $PMF_LANG["msgNewContentName"],
				"msgNewContentMail" => $PMF_LANG["msgNewContentMail"],
				"msgNewContentCategory" => $PMF_LANG["msgNewContentCategory"],
				"printCategoryOptions" => $tree->printCategoryOptions($category),
				"msgNewContentTheme" => $PMF_LANG["msgNewContentTheme"],
                "readonly" => $readonly,
				"printQuestion" => stripslashes(stripslashes($question)),
				"msgNewContentArticle" => $PMF_LANG["msgNewContentArticle"],
				"msgNewContentKeywords" => $PMF_LANG["msgNewContentKeywords"],
				"msgNewContentLink" => $PMF_LANG["msgNewContentLink"],
				"copyright_eintrag" => unhtmlentities($PMF_CONF["copyright_eintrag"]),
				"msgNewContentSubmit" => $PMF_LANG["msgNewContentSubmit"],
				));
$tpl->includeTemplate("writeContent", "index");
?>