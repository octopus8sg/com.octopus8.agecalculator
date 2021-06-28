<?php

require_once 'agecalculator.civix.php';

// phpcs:disable
use CRM_Agecalculator_ExtensionUtil as E;

// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function agecalculator_civicrm_config(&$config)
{
    _agecalculator_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function agecalculator_civicrm_xmlMenu(&$files)
{
    _agecalculator_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function agecalculator_civicrm_install()
{
    _agecalculator_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function agecalculator_civicrm_postInstall()
{
    _agecalculator_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function agecalculator_civicrm_uninstall()
{
    _agecalculator_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function agecalculator_civicrm_enable()
{
    _agecalculator_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function agecalculator_civicrm_disable()
{
    _agecalculator_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function agecalculator_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL)
{
    return _agecalculator_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function agecalculator_civicrm_managed(&$entities)
{
    _agecalculator_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function agecalculator_civicrm_caseTypes(&$caseTypes)
{
    _agecalculator_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function agecalculator_civicrm_angularModules(&$angularModules)
{
    _agecalculator_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function agecalculator_civicrm_alterSettingsFolders(&$metaDataFolders = NULL)
{
    _agecalculator_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function agecalculator_civicrm_entityTypes(&$entityTypes)
{
    _agecalculator_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_themes().
 */
function agecalculator_civicrm_themes(&$themes)
{
    _agecalculator_civix_civicrm_themes($themes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function agecalculator_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function agecalculator_civicrm_navigationMenu(&$menu) {
//  _agecalculator_civix_insert_navigation_menu($menu, 'Mailings', array(
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ));
//  _agecalculator_civix_navigationMenu($menu);
//}

function agecalculator_civicrm_buildForm($formName, &$form)
{
    $templatePath = realpath(dirname(__FILE__) . "/templates");
    if (($formName == 'CRM_Contact_Form_Inline_Demographics')
        || ($formName == 'CRM_Contact_Form_Contact'
            || $formName == 'CRM_Case_Form_CaseView')) {
//      // Assumes templates are in a templates folder relative to this file
        $contact_id = $form->_contactId;
        if($formName == 'CRM_Case_Form_CaseView'){
            $contact_id = $form->_contactID;
        }
        $contact = new CRM_Contact_BAO_Contact();
        $contact->id = $contact_id;
        if (!$contact->find(TRUE)) {
            return civicrm_api3_create_error(ts('Contact id is not valid'));
        }
        if ($contact->birth_date) {
            $birthDate = CRM_Utils_Date::customFormat($contact->birth_date, '%Y%m%d');
            if ($birthDate < date('Ymd')) {
                $deceasedDate = NULL;
                if (!empty($contact->is_deceased) && !empty($contact->deceased_date)) {
                    $deceasedDate = $contact->deceased_date;
                }
                $age = CRM_Utils_Date::calculateAge($birthDate, $deceasedDate);
                $age_y = $age['years'] ?? NULL;
                $age_m = $age['months'] ?? NULL;
            }
        }
        $form->addElement('text', 'age_y', $age_y);
        $form->addElement('text', 'age_m', $age_m);
        // dynamically insert a template block in the page
    } else {
        $form->addElement('text', 'formname', $formName);
    }
    CRM_Core_Region::instance('page-body')->add(array(
        'template' => "{$templatePath}/agefield.tpl",
    ));
}

