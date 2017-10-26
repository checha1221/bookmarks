<h1>  EDITAR USARIO </h1>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Editar  Usuario</h2>
        </div>
        <?=  $this->Form->create($user, ['novalidate']) ?>
        <fieldset>
           <?= $this->element('users/fields')?>
        </fieldset>
         <?=$this->Form->button(__('Editar') ,['class'=>'btn btn-small btn-primary']) ?>
         <?=$this->Form->end() ?>
    </div>
</div>


