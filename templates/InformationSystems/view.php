<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InformationSystem $informationSystem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Information System'), ['action' => 'edit', $informationSystem->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Information System'), ['action' => 'delete', $informationSystem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $informationSystem->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Information Systems'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Information System'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="informationSystems view content">
            <h3><?= h($informationSystem->system_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('System Name') ?></th>
                    <td><?= h($informationSystem->system_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('App Type') ?></th>
                    <td><?= $informationSystem->has('app_type') ? $this->Html->link($informationSystem->app_type->name, ['controller' => 'AppType', 'action' => 'view', $informationSystem->app_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $informationSystem->has('user') ? $this->Html->link($informationSystem->user->id, ['controller' => 'Users', 'action' => 'view', $informationSystem->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Repo Url') ?></th>
                    <td><?= h($informationSystem->repo_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($informationSystem->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($informationSystem->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($informationSystem->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Cicd Pipeline') ?></th>
                    <td><?= $informationSystem->is_cicd_pipeline ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($informationSystem->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Information System Details') ?></h4>
                <?php if (!empty($informationSystem->information_system_details)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('System Name') ?></th>
                            <th><?= __('App Type') ?></th>
                            <th><?= __('Dev Status') ?></th>
                            <th><?= __('Backend Language') ?></th>
                            <th><?= __('Frontend Language') ?></th>
                            <th><?= __('Dbms') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($informationSystem->information_system_details as $details) : ?>
                        <tr>
                            <td><?= h($details->system_name) ?></td>
                            <td><?= $details->has('app_type') ? h($details->app_type->name) : '' ?></td>
                            <td><?= h($details->dev_status) ?></td>
                            <td><?= $details->has('backend_programming_language') ? h($details->backend_programming_language->name) : '' ?></td>
                            <td><?= $details->has('frontend_programming_language') ? h($details->frontend_programming_language->name) : '' ?></td>
                            <td><?= $details->has('dbm') ? h($details->dbm->name) : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'InformationSystemDetails', 'action' => 'view', $details->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'InformationSystemDetails', 'action' => 'edit', $details->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'InformationSystemDetails', 'action' => 'delete', $details->id], ['confirm' => __('Are you sure you want to delete # {0}?', $details->id)]) ?>
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
