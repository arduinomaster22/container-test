<?php

namespace App\Plates\View;

class View
{
    public $layout = null;

    public $layoutContents = null;
    public static function configure()
    {
        return new static();
    }

    public function layout(string $layout, array $data = []): self
    {
        $this->layout = $layout;

        /**
         * Extract the data array to variables
         */
        if (!empty($data)) {
            extract($data);
        }
        /**
         * Return string of the component view with the data passed to it
         */
        ob_start();

        include app()->basePath() . '/resources/views/layouts/' . $layout . '.php';

        $this->layoutContents = ob_get_clean();
        if ($this->layoutContents) {
            $this->layoutContents = str_replace('{{ $slot }}', '', $this->layoutContents);
        }

        return $this;
    }

    public function renderComponent(string $component, array $data = []): string
    {
        $componentDirectory = app()->basePath() . '/resources/views/';

        $componentPath = $componentDirectory . $component . '.php';

        if (!file_exists($componentPath)) {
            throw new \Exception("Component not found: {$componentPath}");
        }


        /**
         * Extract the data array to variables
         */
        if (!empty($data)) {
            extract($data);
        }

        /**
         * Return string of the component view with the data passed to it
         */
        ob_start();
        include $componentPath;
        $output = ob_get_clean();

        /**
         * If the layout is set, replace the {{ $slot }} with the component output
         */
        if ($this->layout) {
            $this->layoutContents = str_replace('{{ $slot }}', $output, $this->layoutContents);
            return $this->layoutContents;
        }
        
        return $output;
    }
}
