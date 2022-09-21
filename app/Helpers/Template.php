<?php

    namespace App\Helpers;

    use Illuminate\Support\Facades\Config;

    class Template
    {

        /**
         * @param $controllerName
         * @param $itemsStatusCount
         * @return ?string
         */
        public static function showButtonFilter($controllerName, $itemsStatusCount, $currentFilterStatus)
        : ?string
        {
            $xhtml      = null;
            $tmplStatus = Config::get('temp.template.status');

            if (count($itemsStatusCount) > 0) {
                array_unshift($itemsStatusCount, [
                    'status' => 'all',
                    'count'  => array_sum(array_column($itemsStatusCount, 'count'))
                ]);

                foreach ($itemsStatusCount as $item) {  // $item = [count,status]
                    $statusValue = $item['status'];  // active inactive block
                    $statusValue = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default'; // check

                    $currentTemplateStatus = $tmplStatus[$statusValue]; // $value['status'] inactive block active
                    $link                  = route($controllerName) . "?filter_status=" . $statusValue;
                    $class                 = ($currentFilterStatus == $statusValue) ? 'active' : '';

                    $xhtml .= sprintf('
                        <li class="nav-item">
                            <a class="nav-link %s fw-semibold" href="%s"
                               role="tab">%s<span class="badge badge-soft-danger align-middle rounded-pill ms-1">%s</span>
                            </a>
                        </li>', $class, $link, $currentTemplateStatus['name'], $item['count']
                    );
                }
            }
            return $xhtml;
        }

        /**
         * @param $name
         * @param $depth
         * @return string
         */
        public static function categoriesNested($name, $depth)
        : string
        {
            return str_repeat('|-- ', $depth - 1) . $name;
        }


        /**
         * @param $time
         * @return string
         */
        public static function showItemHistory($time)
        : string
        {
            return date(Config::get('temp.format.short_time'), strtotime($time));
        }

        /**
         * @param $categories
         * @param $id
         * @param $xhtml
         * @return void
         */
        public static function categories($categories, &$ids, &$xhtml) :void
        {
            $checked = '';
            foreach ($categories as $category) {
                foreach($ids as $id) {
                    ($category['id'] == $id ? $checked = 'checked' : $checked = '');
                }

                if (count($category['children']) > 0) {
                    $xhtml .= sprintf('<li value="%s">
                        <input class="form-check-input" %s type="checkbox"  value="%s" name="categories[]">
                        <label class="mb-2">%s</label><ul class="form-check list-unstyled">', $category['id'], $checked, $category['id'], $category['name']);
                        self::categories($category['children'], $id,$xhtml);
                    $xhtml .= '</ul></li>';
                } else {
                    $xhtml .= sprintf('<li value="%s">
                        <input class="form-check-input" %s type="checkbox"  value="%s" name="categories[]">
                        <label class="mb-2">%s</label>', $category['id'], $checked, $category['id'], $category['name']);
                    $xhtml .= '</li>';
                }
            }
        }

        /**
         * @param $statusValue
         * @return string
         */
        public static function showItemStatus($statusValue)
        : string
        {
            $tempStatus        = Config::get('temp.template.status');
            $statusValue       = array_key_exists($statusValue, $tempStatus) ? $statusValue : 'default';
            $currentTempStatus = $tempStatus[$statusValue]; //  'publish'  => ['name' => 'Published', 'class' => 'badge badge-soft-success text-uppercase'],

            return sprintf(' <span class="%s">%s</span>', $currentTempStatus['class'], $currentTempStatus['name']);

        }

        /**
         * @param $controllerName
         * @param $id
         * @return string
         */
        public static function showButtonAction($controllerName, $id)
        : string
        {
            $buttonInArea = Config::get('temp.config.button'); //'category'        => ['edit', 'delete'],
            $tmplButton   = Config::get('temp.template.button'); // 'edit'      => ['class'=> 'btn-success' , 'title'=> 'Edit'      , 'icon' => 'fa-pencil' , 'route-name' => '/form'],

            $controllerName = (array_key_exists($controllerName, $buttonInArea)) ? $controllerName : "default"; // return category
            $listButtons    = $buttonInArea[$controllerName]; // ['edit', 'delete']

            $xhtml = '<ul class="list-inline hstack gap-2 mb-0">';

            foreach ($listButtons as $btn) {
                $currentButton = $tmplButton[$btn];

                $link = route($controllerName . $currentButton['route-name'], ['id' => $id]);

                $xhtml .= sprintf(
                    '<li class="list-inline-item edit" data-bs-toggle="tooltip"
                                        data-bs-trigger="hover" data-bs-placement="top" title="%s">
                                        <a href="%s"class="%s"><i class="%s"></i></a>
                                    </li>', $currentButton['title'], $link, $currentButton['class'], $currentButton['icon']);
            }
            $xhtml .= '</ul>';

            return $xhtml;
        }


    }
