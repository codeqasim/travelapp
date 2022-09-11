<?php

// USING MEEDO NAMESPACE
use Medoo\Medoo;

// INCLUDE CORE FILE
require_once '_core.php';
require_once 'auth.php';

// INCLUDE HEADER FILE
$title = 'Currencies';
include 'header.php';

?>

<header class="bg-dark row">
    <div class="px-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-white py-3 mb-0 display-6">Currencies</h1>
            <div class="ms-4">

            <div class="d-flex gap-1">

            <div class="col-12 col-md-auto flex-shrink-0">
                 <input class="form-control mb-0" id="" placeholder="Search..." value="" style="min-width: 13rem; height: 3rem">
            </div>

            <select name="" id="" class="form-select" style="width:100px">
                <option value="">name</option>
                <option value="">email</option>
                <option value="">status</option>
            </select>

            <button class="btn btn-outline-light" style="width:100px">
                Search
            </button>

            <button class="btn btn-danger" style="width:100px">
                Delete
            </button>

            </div>
            
            </div>
        </div>
    </div>
</header>

<table class="c-table-frame ">
   <thead class="l-table-frame-headers">
      <tr class="l-table-frame-headers-line">
         <th class="c-table-frame__header c-table-frame__header--select-all" role="button" scope="col">
            <div class="c-table-frame__checkbox-select-all
               c-table-frame__checkbox-select-all--no-border-top">
               <div class="l-table-frame-checkbox-select-all">
                  <div id="ember1059" class="ember-view">
                     <div class="c-beta-dropdown c-dropdown-checkbox" role="button" id="ember1060">
                        <div style="margin-left:14px" id="ember1061" class="c-beta-checkbox c-beta-checkbox--small c-beta-checkbox--primary c-beta-checkbox--off c-beta-checkbox--primary-off ember-view">
                           <input id="ember1062" class="ember-checkbox ember-view c-beta-checkbox__input" aria-label="checkbox" type="checkbox" value="">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </th>
         <th id="ember1063" class="c-table-frame__header c-table-column-header ember-view">
            <span class="c-table-column-header__content
               c-table-column-header__content--no-border-top">
               
               <span class="c-table-column-header__display-name
                  c-table-column-header__display-name--first" role="button">
               No
               </span>
               
            </span>
         </th>
         <th id="ember1064" class="c-table-frame__header c-table-column-header ember-view">
            <span class="c-table-column-header__content
               c-table-column-header__content--no-border-top">
               
               <span class="c-table-column-header__display-name
                  c-table-column-header__display-name--sortable 
                  " role="button">
               thumb
               </span>
               <i id="ember1064-filter-popup-anchor" class="material-icons c-table-column-header__filter
                  " role="button">
               filter_list
               </i>
            </span>
         </th>
         <th id="ember1065" class="c-table-frame__header c-table-column-header ember-view">
            <span class="c-table-column-header__content
               c-table-column-header__content--no-border-top">
               
               <span class="c-table-column-header__display-name
                  c-table-column-header__display-name--sortable 
                  " role="button">
               name
               </span>
               <i id="ember1065-filter-popup-anchor" class="material-icons c-table-column-header__filter
                  " role="button">
               filter_list
               </i>
            </span>
         </th>
         <th id="ember1066" class="c-table-frame__header c-table-column-header ember-view">
            <span class="c-table-column-header__content
               c-table-column-header__content--no-border-top">
               
               <span class="c-table-column-header__display-name
                  c-table-column-header__display-name--sortable 
                  " role="button">
               email
               </span>
               <i id="ember1066-filter-popup-anchor" class="material-icons c-table-column-header__filter
                  " role="button">
               filter_list
               </i>
            </span>
         </th>
         <th id="ember1067" class="c-table-frame__header c-table-column-header ember-view"><span class="c-table-column-header__content
            c-table-column-header__content--no-border-top">
            <span class="c-table-column-header__display-name
               c-table-column-header__display-name--sortable 
               " role="button">
            created at
            </span>
            <i id="ember1067-filter-popup-anchor" class="material-icons c-table-column-header__filter
               " role="button">
            filter_list
            </i>
            </span>
         </th>
         <th id="ember1069" class="c-table-frame__header c-table-column-header ember-view">
            <span class="c-table-column-header__content
               c-table-column-header__content--no-border-top">
               
               <span class="c-table-column-header__display-name
                  c-table-column-header__display-name--sortable 
                  " role="button">
               birth date
               </span>
               <i id="ember1069-filter-popup-anchor" class="material-icons c-table-column-header__filter
                  " role="button">
               filter_list
               </i>
            </span>
         </th>
         <th id="ember1070" class="c-table-frame__header c-table-column-header ember-view">
            <span class="c-table-column-header__content
               c-table-column-header__content--no-border-top">
               
               <span class="c-table-column-header__display-name
                  c-table-column-header__display-name--sortable 
                  " role="button">
               action
               </span>
            
            </span>
         </th>
      </tr>
   </thead>
   <tbody class="l-table-frame-body">
      
    <?php for ($i = 1; $i <= 25; $i++) { ?>

      <tr class="c-table-line
         " role="button">
         <td class="c-table-line__checkbox" role="checkbox">
            <div id="ember1189" class="c-table-line__checkbox-input  c-beta-checkbox c-beta-checkbox--small c-beta-checkbox--primary c-beta-checkbox--off c-beta-checkbox--primary-off ember-view">
               <input id="ember1190" class="ember-checkbox ember-view c-beta-checkbox__input" aria-label="checkbox" type="checkbox" value="">
            </div>
         </td>
         <td class="c-table-line__column" role="button">
            
            <div>
               <?=$i?>
            </div>
         </td>
         <td class="c-table-line__column" role="button">
            
            <div>
               <div id="ember1191" class="c-column-file-viewer ember-view">
                  <img id="ember1191__image" src="https://robohash.org/facereestlaboriosam.png" class="c-column-file-viewer__image
                     " role="button">
               </div>
            </div>
         </td>
         <td class="c-table-line__column" role="button">
            
            <div>
               <div id="ember1192" class="ember-view">
                  <a href="/Live%20Demo/Production/Operations/data/806049/index/record/806049/17297/details" id="ember1193" class="ember-view c-beta-button c-beta-button--link-info c-beta-button--normal c-widget-column-display-belongs-to__link">
                     <span class="c-beta-button__text">Qasim Hussain</span>
                  </a>
               </div>
            </div>
         </td>
         <td class="c-table-line__column" role="button">
            <div>
               compoxition@gmail.com
            </div>
         </td>
         <td class="c-table-line__column" role="button">
            
            <div>
               03/20/2018 11:11:36 PM
            </div>
         </td>
         <td class="c-table-line__column" role="button">
            
            <div>
               29 May 1986
            </div>
         </td>
         <td class="c-table-line__column" role="button">
            <div>
               <div class="btn btn-outline-success btn-sm">Edit</div>
               <div class="btn btn-outline-danger btn-sm">Delete</div>
            </div>
         </td>
      </tr>
    <?php } ?>

   </tbody>
</table>

<div class="dataTable-bottom">
   <div class="dataTable-info">Showing 1 to 10 of 100 entries</div>
   <nav class="dataTable-pagination">
      <ul class="dataTable-pagination-list">
         <li class="active"><a href="#" data-page="1">1</a></li>
         <li class=""><a href="#" data-page="2">2</a></li>
         <li class=""><a href="#" data-page="3">3</a></li>
         <li class=""><a href="#" data-page="4">4</a></li>
         <li class=""><a href="#" data-page="5">5</a></li>
         <li class=""><a href="#" data-page="6">6</a></li>
         <li class=""><a href="#" data-page="7">7</a></li>
         <li class="ellipsis"><a href="#">…</a></li>
         <li class=""><a href="#" data-page="10">10</a></li>
         <li class="pager"><a href="#" data-page="2">›</a></li>
      </ul>
   </nav>
</div>


<style>
/* .container-xl{padding-left:0px} */
</style>
<?php include 'footer.php'; ?>