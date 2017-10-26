<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Crear Enlace</h2>
        </div>
        <?=  $this->Form->create($bookmark, ['novalidate']) ?>
        <fieldset>
          <?= $this->element('bookmarks/fields')?>
        </fieldset>
         <?=$this->Form->button(__('Crear') ,['class'=>'btn btn-small btn-primary']) ?>
         <?=$this->Form->button('Reset', array('type'=>'reset' ,'class' => 'btn btn-danger'));?>
         <?=$this->Form->end() ?>
    </div>
</div>


