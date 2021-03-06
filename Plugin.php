<?php

namespace Kanboard\Plugin\Timetrackingeditor;

use Kanboard\Core\Translator;
use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\Timetrackingeditor\Model\SubtaskTimeTrackingModel;
use Kanboard\Plugin\Timetrackingeditor\Console\SubtaskTimeTrackingExportCommand;
use Kanboard\Plugin\Timetrackingeditor\Console\AllSubtaskTimeTrackingExportCommand;

class Plugin extends Base
{
    public function initialize()
    {
      $this->hook->on("template:layout:css", array("template" => "plugins/Timetrackingeditor/assets/css/timetrackingeditor.css"));
      $this->template->setTemplateOverride('task/time_tracking_details', 'timetrackingeditor:time_tracking_editor');
      $this->template->setTemplateOverride('subtask/timer', 'timetrackingeditor:subtask/timer');

      $this->helper->register("subtaskPermission", "Kanboard\Plugin\Timetrackingeditor\Helper\SubtaskPermissionHelper");

      $this->container["cli"]->add(new SubtaskTimeTrackingExportCommand($this->container));
      $this->container["cli"]->add(new AllSubtaskTimeTrackingExportCommand($this->container));
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getClasses()
    {
      return array(
      	'Plugin\Timetrackingeditor' => array(
      		'DateParser'
        ),
        'Plugin\Timetrackingeditor\Model' => array(
            'SubtaskTimeTrackingCreationModel',
            'SubtaskTimeTrackingEditModel',
            'SubtaskTimeTrackingModel',
        ),
        'Plugin\Timetrackingeditor\Filter' => array(
          'SubtaskFilter',
          'SubtaskTaskFilter',
          'SubtaskTitleFilter'
        ),
        'Plugin\Timetrackingeditor\Console' => array(
          'SubtaskTimeTrackingExportCommand',
          'AllSubtaskTimeTrackingExportCommand'
        ),
        'Plugin\Timetrackingeditor\Controller' => array(
          'SubtaskStatusController',
          'SubtaskAjaxController',
          'TimeTrackingEditorController'
        ),
        'Plugin\Timetrackingeditor\Export' => array(
          'SubtaskTimeTrackingExport'
        ),
        'Plugin\Timetrackingeditor\Validator' => array(
          'SubtaskTimeTrackingValidator'
        ),
        'Plugin\Timetrackingeditor\Formatter' => array(
          'SubtaskAutoCompleteFormatter'
        ),
          'Plugin\Timetrackingeditor\Helper' => array(
              'SubtaskPermissionHelper'
          ),
      );
    }

    public function getPluginName()
    {
        return 'TimeTrackingEditor';
    }

    public function getPluginDescription()
    {
        return t('Allows Editing of TimeTracking Values');
    }

    public function getPluginAuthor()
    {
        return 'Thomas Stinner, ipunkt Business Solutions';
    }

    public function getPluginVersion()
    {
        return '1.1.2';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/ipunkt/kanboard-Timetrackingeditor';
    }

    public function getCompatibleVersion()
    {
	 return '>=1.2.4';
    }
}
