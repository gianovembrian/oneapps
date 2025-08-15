<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UnitKerja $unitKerja
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Unit Kerja'), ['action' => 'edit', $unitKerja->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Unit Kerja'), ['action' => 'delete', $unitKerja->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unitKerja->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Unit Kerja'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Unit Kerja'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="unitKerja view content">
            <h3><?= h($unitKerja->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($unitKerja->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($unitKerja->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($unitKerja->code) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related List Sisfo') ?></h4>
                <?php if (!empty($unitKerja->list_sisfo)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Unit Kerja Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('App Type Id') ?></th>
                            <th><?= __('Dev Status') ?></th>
                            <th><?= __('Ip Address') ?></th>
                            <th><?= __('Program Lang') ?></th>
                            <th><?= __('Framework') ?></th>
                            <th><?= __('Dbms') ?></th>
                            <th><?= __('Developer') ?></th>
                            <th><?= __('Pic') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Program Lang Ver') ?></th>
                            <th><?= __('System Name') ?></th>
                            <th><?= __('Domain') ?></th>
                            <th><?= __('Other Program Lang') ?></th>
                            <th><?= __('Other Dbms') ?></th>
                            <th><?= __('Dbms Ver') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($unitKerja->list_sisfo as $listSisfo) : ?>
                        <tr>
                            <td><?= h($listSisfo->id) ?></td>
                            <td><?= h($listSisfo->unit_kerja_id) ?></td>
                            <td><?= h($listSisfo->user_id) ?></td>
                            <td><?= h($listSisfo->app_type_id) ?></td>
                            <td><?= h($listSisfo->dev_status) ?></td>
                            <td><?= h($listSisfo->ip_address) ?></td>
                            <td><?= h($listSisfo->program_lang) ?></td>
                            <td><?= h($listSisfo->framework) ?></td>
                            <td><?= h($listSisfo->dbms) ?></td>
                            <td><?= h($listSisfo->developer) ?></td>
                            <td><?= h($listSisfo->pic) ?></td>
                            <td><?= h($listSisfo->description) ?></td>
                            <td><?= h($listSisfo->is_active) ?></td>
                            <td><?= h($listSisfo->program_lang_ver) ?></td>
                            <td><?= h($listSisfo->system_name) ?></td>
                            <td><?= h($listSisfo->domain) ?></td>
                            <td><?= h($listSisfo->other_program_lang) ?></td>
                            <td><?= h($listSisfo->other_dbms) ?></td>
                            <td><?= h($listSisfo->dbms_ver) ?></td>
                            <td><?= h($listSisfo->created) ?></td>
                            <td><?= h($listSisfo->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ListSisfo', 'action' => 'view', $listSisfo->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ListSisfo', 'action' => 'edit', $listSisfo->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ListSisfo', 'action' => 'delete', $listSisfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $listSisfo->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($unitKerja->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Id Pegawai') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Unit Kerja Id') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Nip') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($unitKerja->users as $user) : ?>
                        <tr>
                            <td><?= h($user->id) ?></td>
                            <td><?= h($user->name) ?></td>
                            <td><?= h($user->id_pegawai) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td><?= h($user->unit_kerja_id) ?></td>
                            <td><?= h($user->role_id) ?></td>
                            <td><?= h($user->password) ?></td>
                            <td><?= h($user->nip) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $user->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $user->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
