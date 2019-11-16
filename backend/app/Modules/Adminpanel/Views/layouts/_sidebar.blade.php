 <ul class="sidebar-menu">
    <li class="header">НАВИГАЦИЯ</li>
    <li class="treeview">
      <a href="/admin">
        <i class="fa fa-dashboard"></i> <span>Главная</span>
      </a>
    </li>
    <li><a href="{{ route('adminpanel.users.index') }}"><i class="fa fa-tags"></i> <span>Пользователи</span></a></li>
     <li><a href="{{ route('adminpanel.branches.index') }}"><i class="fa fa-tags"></i> <span>Филиалы</span></a></li>
     <li><a href="{{ route('adminpanel.departments.index') }}"><i class="fa fa-tags"></i> <span>Отделы</span></a></li>
     <li><a href="{{ route('adminpanel.positions.index') }}"><i class="fa fa-tags"></i> <span>Должности</span></a></li>
     <li><a href="{{ route('adminpanel.directory.index') }}"><i class="fa fa-tags"></i> <span>Справочник</span></a></li>
     <li class="treeview menu-open" style="height: auto;">
         <a href="#">
             <i class="fa fa-share"></i> <span>Склад</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
         <ul class="treeview-menu" style="display: none;">
             <li><a href="{{ route('adminpanel.comingproducts.index') }}"><i class="fa fa-tags"></i> <span>Приход</span></a></li>
             <li><a href="{{ route('adminpanel.uncomingproducts.index') }}"><i class="fa fa-tags"></i> <span>Расход</span></a></li>
             <li><a href="#"><i class="fa fa-tags"></i> <span>Инвентаризация</span></a></li>
             <li><a href="#"><i class="fa fa-tags"></i> <span>Отчет</span></a></li>
         </ul>
     </li>
</ul>
