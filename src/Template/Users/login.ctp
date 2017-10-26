<?= $this->Html->css('login') ?>
<div class="container">

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <?= $this->Flash->render('auth') ?>
		<?= $this->Form->create() ?>
			<fieldset>
				<h2>Please Sign In</h2>
				<hr class="colorgraph">
				<div class="form-group">
                    <?= $this->Form->input('email',['class'=>'form-control input-lg','placeholder'=>'Correo','label'=>false,'required'])?>
				</div>
				<div class="form-group">
                    <?= $this->Form->input('password',['class'=>'form-control input-lg','placeholder'=>'Contraseña','label'=>false,'required'])?>
				</div>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <?= $this->Form->button('Acceder',['class'=>'btn btn-lg btn-info btn-block'] )?>
					</div>
																	
				</div>
			</fieldset>
		<?= $this->Form->end() ?>
			</div>
	</div>
</div>

</div>
