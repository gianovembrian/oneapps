<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InformationSystemDetail $informationSystemDetail
 * @var \Cake\Collection\CollectionInterface|string[] $informationSystems
 * @var \Cake\Collection\CollectionInterface|string[] $programmingLanguages
 * @var \Cake\Collection\CollectionInterface|string[] $dbms
 * @var \Cake\Collection\CollectionInterface|string[] $appType
 * @var \Cake\Collection\CollectionInterface|string[] $containerTechnologies
 * @var \Cake\Collection\CollectionInterface|string[] $devopsTools
 * @var \Cake\Collection\CollectionInterface|string[] $frameworks
 * @var \Cake\Collection\CollectionInterface|string[] $securityTools
 * @var \Cake\Collection\CollectionInterface|string[] $webServers
 * @var \Cake\Collection\CollectionInterface|string[] $unitKerja
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Information System Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="informationSystemDetails form content">
            <?= $this->Form->create($informationSystemDetail) ?>
            <fieldset>
                <legend><?= __('Add Information System Detail') ?></legend>
                <?php
                    echo $this->Form->control('information_system_id', ['options' => $informationSystems]);
                    echo $this->Form->control('system_type');
                    echo $this->Form->control('dev_status');
                    echo $this->Form->control('ip_address');
                    echo $this->Form->control('programming_language_id', ['options' => $programmingLanguages, 'empty' => true]);
                    echo $this->Form->control('program_lang_ver');
                    echo $this->Form->control('other_program_lang');
                    echo $this->Form->control('dbms_id', ['options' => $dbms, 'empty' => true]);
                    echo $this->Form->control('dbms_ver');
                    echo $this->Form->control('other_dbms');
                    echo $this->Form->control('app_type_id', ['options' => $appType, 'empty' => true]);
                    echo $this->Form->control('container_tech_id', ['options' => $containerTechnologies, 'empty' => true]);
                    echo $this->Form->control('devops_tool_id', ['options' => $devopsTools, 'empty' => true]);
                    echo $this->Form->control('framework_id', ['options' => $frameworks, 'empty' => true]);
                    echo $this->Form->control('security_tool_id', ['options' => $securityTools, 'empty' => true]);
                    echo $this->Form->control('web_server_id', ['options' => $webServers, 'empty' => true]);
                    echo $this->Form->control('developer');
                    echo $this->Form->control('pic');
                    echo $this->Form->control('description');
                    echo $this->Form->control('is_active');
                    echo $this->Form->control('system_name');
                    echo $this->Form->control('domain');
                    echo $this->Form->control('unit_kerja_id', ['options' => $unitKerja]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
