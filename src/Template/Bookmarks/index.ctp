
<div class="container">
  <h2>List Group 
<?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Nuevo',['controller' => 'Bookmarks', 'action' => 'add'],[
'class' => 'btn btn-primary pull-right','escape' => false ]); ?>
  </h2>
  <div class="list-group">

   

 
   <?php  foreach ($bookmarks as $bookmark): ?>
     <li class="list-group-item">
      <h4 class="list-group-item-heading"><?= h($bookmark->title) ?></h4>
      <p>
        <strong class="text-info">
          <small>
            <?= $this->Html->link($bookmark->url, null,['target' => 'blank'])?>
          </small>
        </strong>
       </p>
     
      <p class="list-group-item-text">
        <?= h($bookmark->description) ?>
      </p>
      <?= $this->Html->link('Editar', ['controller'  => 'Bookmarks', 'action' => 'edit',
          $bookmark->id], ['class' => 'btn btn-sm btn-primary']) ?>
      <?= $this->Form->postLink('Eliminar', ['controller' => 'Bookmarks', 'action' => 'delete',
          $bookmark->id], ['confirm' => 'Eliminar enlace ?', 'class' => 'btn btn-sm btn-danger']) ?>
    </li>
    <?php endforeach ?>
  
  </ul>
    
    

  </div>

  </div>
<div align="center">
        <div class="paginator" >
        <ul class="pagination">
          
            <?= $this->Paginator->prev('< Anterior ') ?>
            <?= $this->Paginator->numbers(['before' =>'','after' =>'']) ?>
            <?= $this->Paginator->prev('Siguiente >') ?>
            
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina{{page}} De {{pages}}, Mostrando {{current}} Registro(s) de {{count}}  en total')]) ?></p>
    </div>
    </div>
    
