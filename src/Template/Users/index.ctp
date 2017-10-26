<div class="row">
    <div class="col.md-12">
        <div class="page-heder">
            <h2>Usuarios</h2>
        </div>
        <div class=" table-responsive">
            <table class="table table-striped table-hover">
             <thead>
            <tr   class="info">
                <th scope="col"><?= $this->Paginator->sort('#') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
         <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id],   ['class'=>'btn btn-small btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id],['class'=>'btn btn-small btn-primary']) ?>
                    <?= $this->Form->postLink('Delete', ['action' => 'borrar' , $user->id],[
                    'confirm'=> 'eliminar usuario ?','class' => 'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </div>
    <div align="center">
        <div class="paginator" >
        <ul class="pagination">
          
            <?= $this->Paginator->prev('< Anterior ') ?>
            <?= $this->Paginator->numbers(['before' =>'','after' =>'']) ?>
            <?= $this->Paginator->prev('Siguiente >') ?>
            
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} of {{pages}}, Mostrando {{current}} Registro(s) de {{count}}  en Total')]) ?></p>
    </div>
    </div>
    </div>
</div>





