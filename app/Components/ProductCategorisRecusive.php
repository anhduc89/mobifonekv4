<?php
    namespace App\Components;
    use App\Models\ProductCategories;

    class ProductCategorisRecusive {
        private $html;
        public function __construct()
        {
            $this->html = '';
        }
        public function ProductCategorisRecusiveAdd($parent_id = 0, $subMark = '')
        {
            $data = ProductCategories::where('parent_id', $parent_id)->get();
            // Menus::where('parent_id', $parent_id)->get();
            foreach($data as $item)
            {
                $this->html .= '<option value="'.$item->id.'">'.$subMark. $item->name.'</option>';
                $this->ProductCategorisRecusiveAdd($item->id, $subMark . ' -- ' );
            }
            return $this->html;
        }
    }

?>
