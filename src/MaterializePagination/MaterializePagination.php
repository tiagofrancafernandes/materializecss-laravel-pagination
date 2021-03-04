<?php

namespace TiagoF2\MaterializePagination;

class MaterializePagination {

    protected $color;
    protected $to_paginate;

    public function __construct($to_paginate)
    {
        $this->to_paginate = $to_paginate;
    }

    /**
     * Convert the URL window into Materialize CSS HTML.
     *
     * @return string
     */

    public function render()
    {
        if (!$this->to_paginate->hasPages())
            return '';

        return sprintf(
            '<div><ul class="pagination">%s %s %s</ul></div>',
            $this->getPreviousPageLink(),
            $this->getPageLinks(),
            $this->getNextPageLink()
        );
    }

    protected function getPreviousPageLink()
    {
        $html = '';
        //Previous Page Link
        if($this->to_paginate->onFirstPage())
            $html .= '<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>';
        else
            $html .= '<li class="waves-effect"><a href="'. $this->to_paginate->previousPageUrl() .'"><i class="material-icons">chevron_left</i></a></li>';
        
        return $html;
    }

    protected function getPageLinks()
    {
        $color = $this->color ?: '';

        $html = '';
        // Page Number Links
        for($i=1; $i <= $this->to_paginate->lastPage(); $i++)
        {
            if($i==$this->to_paginate->currentPage())
                $html .= '<li class="active ' . $color . '"><a href="?page='. $i .'">'. $i .'</a></li>';
            else
                $html .= '<li class="waves-effect"><a href="?page='. $i .'">'. $i .'</a></li>';
        }

        return $html;
    }

    protected function getNextPageLink()
    {
        $html = '';
        // Next Page Link
        if ($this->to_paginate->hasMorePages())
            $html .= '<li class="waves-effect"><a href="'. $this->to_paginate->nextPageUrl() .'"><i class="material-icons">chevron_right</i></a></li>';
        else
            $html .= '<li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>';

        return $html;
    }

    /**
     * Set the color to override the default red.
     * Example: 'lime'
     * Example: 'lime darken-2'
     *
     * @param $color
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

}