
<nav class="navbar navbar-default"  >
<div class="container-fluid">
    <div class="navbar-header">
       <?= $this->Html->link('Bookmarks',['controller' => 'Users','action'=>'index'],['class'=>'navbar-brand'])?>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php if(isset($current_user)): ?>
        <?php if($current_user['role'] == 'admin'): ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuarios <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><?= $this->Html->link('Listar Usuarios',['controller'=>'Users','action'=>'index'])  ?></li>
            <li><?= $this->Html->link('Crear Usuarios',['controller'=>'Users','action'=>'add'])  ?></li>
          </ul>
        </li>
        <?php endif; ?>
        <?php if($current_user['role'] == 'user' || 'admin'): ?>
         <li>
          <?= $this->Html->link('Mi lista',['controller'=> 'bookmarks', 'action' => 'index'])?>
         </li>
       <?php endif; ?>
      </ul>

        <ul class="nav navbar-nav navbar-right">
        <li>
         <?= $this->Html->link('Logout',['controller'=> 'Users', 'action' => 'logut'])?>
        </li>
      <?php else: ?>
        <li>
         <?= $this->Html->link('Registrarse',['controller'=> 'Users', 'action' => 'add'])?>
        </li>
       <?php endif; ?>
        </ul>
    </div>
  </div>
</nav>
