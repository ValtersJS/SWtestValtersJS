<?php

// spl_autoload_register('autoLoad');

// function autoLoad($className) {
//   $pathArray = array(
//     'Core/Controller/',
//     'Core/Repository/',
//     'ListPage/Items/',
//     'ListPage/ListPageLogic/',
//     'AddPage/'
//   );

//   $extension = ".php";
  
//   foreach($pathArray as $path) {
//     $fullPath = $path . $className . $extension;

//     if(file_exists($fullPath)) {
//       include_once $fullPath;
//     }
//   }
// }

spl_autoload_register(function ($class) {
        include_once str_replace('\\', '/', $class) . '.php';
      });
