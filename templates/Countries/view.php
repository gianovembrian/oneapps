<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country $country
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Country'), ['action' => 'edit', $country->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Country'), ['action' => 'delete', $country->id], ['confirm' => __('Are you sure you want to delete # {0}?', $country->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Countries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Country'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="countries view content">
            <h3><?= h($country->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($country->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($country->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($country->name) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Overseas Trip') ?></h4>
                <?php if (!empty($country->overseas_trip)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Country Id') ?></th>
                            <th><?= __('Actvity Notes') ?></th>
                            <th><?= __('Organizer') ?></th>
                            <th><?= __('Event Date Start') ?></th>
                            <th><?= __('Event Date Finish') ?></th>
                            <th><?= __('Departure Date') ?></th>
                            <th><?= __('Arrival Date') ?></th>
                            <th><?= __('Source Fund') ?></th>
                            <th><?= __('Other Notes') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($country->overseas_trip as $overseasTrip) : ?>
                        <tr>
                            <td><?= h($overseasTrip->id) ?></td>
                            <td><?= h($overseasTrip->user_id) ?></td>
                            <td><?= h($overseasTrip->country_id) ?></td>
                            <td><?= h($overseasTrip->actvity_notes) ?></td>
                            <td><?= h($overseasTrip->organizer) ?></td>
                            <td><?= h($overseasTrip->event_date_start) ?></td>
                            <td><?= h($overseasTrip->event_date_finish) ?></td>
                            <td><?= h($overseasTrip->departure_date) ?></td>
                            <td><?= h($overseasTrip->arrival_date) ?></td>
                            <td><?= h($overseasTrip->source_fund) ?></td>
                            <td><?= h($overseasTrip->other_notes) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'OverseasTrip', 'action' => 'view', $overseasTrip->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'OverseasTrip', 'action' => 'edit', $overseasTrip->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'OverseasTrip', 'action' => 'delete', $overseasTrip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $overseasTrip->id)]) ?>
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
