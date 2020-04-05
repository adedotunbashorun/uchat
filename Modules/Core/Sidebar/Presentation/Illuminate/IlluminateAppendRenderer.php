<?php

namespace Modules\Core\Sidebar\Presentation\Illuminate;

use Illuminate\Contracts\View\Factory;
use Maatwebsite\Sidebar\Append;
use Maatwebsite\Sidebar\Presentation\Illuminate\IlluminateAppendRenderer as PackageAppendRenderer;

class IlluminateAppendRenderer extends PackageAppendRenderer
{
    /**
     * @var Factory
     */
    protected $factory;

    /**
     * @var string
     */
    protected $view = 'core::sidebar.append';

    /**
     * @param Factory $factory
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param Append $append
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render(Append $append)
    {
        if ($append->isAuthorized()) {
            return $this->factory->make($this->view, [
                'append' => $append
            ])->render();
        }
    }
}
