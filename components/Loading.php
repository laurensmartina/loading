<?php namespace CGGStudio\Loading\Components;

use Lang;
use Cms\Classes\ComponentBase;
use \stdClass;

class Loading extends ComponentBase
{
    private $Loading;

    public function componentDetails()
    {
        return [
            'name' => 'cggstudio.loading::lang.plugin.name',
            'description' => 'cggstudio.loading::lang.plugin.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'speedCGGStudio' => [
                'title'                 => 'cggstudio.loading::lang.messages.Speed',
                'description'           => 'cggstudio.loading::lang.messages.Speed_description',
                'default'               => 300,
                'type'                  => 'string',
                'validationPattern'     => '^[0-9]*$',
                'validationMessage'     => 'cggstudio.loading::lang.messages.Speed_validation',
                'showExternalParameter' => false
            ],
            'backgroundColorCGGStudio' => [
                'title'                 => 'cggstudio.loading::lang.messages.Background',
                'description'           => 'cggstudio.loading::lang.messages.Background_description',
                'default'               => '#FFF',
                'type'                  => 'string',
                'validationPattern'     => '#([a-fA-F0-9]){3}(([a-fA-F0-9]){3})?\b',
                'validationMessage'     => 'cggstudio.loading::lang.messages.Background_validation',
                'showExternalParameter' => false
            ],
            
        ];
    }

    public function onRun()
    {
        $this->Loading = new stdClass();
        $this->Loading->backgroundColor = $this->property('backgroundColorCGGStudio');
        $this->Loading->speed = $this->property('speedCGGStudio');
        $this->page['loading'] = $this->Loading;

        // Add css
        $this->addCss('assets/css/default.css');
      
    }
}
