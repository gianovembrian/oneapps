<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppType $appType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit App Type'), ['action' => 'edit', $appType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete App Type'), ['action' => 'delete', $appType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List App Type'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New App Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="appType view content">
            <h3><?= h($appType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($appType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($appType->name) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related List Sisfo') ?></h4>
                <?php if (!empty($appType->list_sisfo)) : ?>
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
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($appType->list_sisfo as $listSisfo) : ?>
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
        </div>
    </div>
</div>
