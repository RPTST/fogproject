<?php
/**
 * Handles exporting of csv, pdf, or DB after verification
 *
 * PHP version 5
 *
 * @category Export
 * @package  FOGProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://fogproject.org
 */
require '../commons/base.inc.php';
$user = $_POST['fogguiuser'];
$pass = $_POST['fogguipass'];
if (!$currentUser->passwordValidate($user, $pass, true)) {
    die('###'.$foglang['InvalidLogin']);
}
$report = unserialize($_SESSION['foglastreport']);
if (!($report instanceof ReportMaker)) {
    $report = FOGCore::getClass('ReportMaker');
}
$report->outputReport();
