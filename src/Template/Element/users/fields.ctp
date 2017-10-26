  <?php
            echo $this->Form->control('first_name',['label'=> 'Nombre','placeholder'=>'Nombre']);
            echo $this->Form->control('last_name', ['label'=> 'Apellido','placeholder'=>'Apellido']);
            echo $this->Form->control('email',     ['label'=> 'Correo Electronico','placeholder'=>'Correo@ejemplo.com']);
            echo $this->Form->control('password',  ['label'=> 'Contraseña','placeholder'=>'Contraseña' ,'value' => '']);
            
 ?>