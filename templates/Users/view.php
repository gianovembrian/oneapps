<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="users view content">
            <div class="card">
                <div class="card-header border-2">
                    <div class="card-title">
                       <h2><?= h($user->name) ?></h2>
                    </div>
                </div>

                <div class="card-body">
                    <div class="details">
                        <div class="detail-row">
                            <div class="detail-label"><?= __('ID') ?></div>
                            <div class="detail-value"><?= h($user->id) ?></div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label"><?= __('Name') ?></div>
                            <div class="detail-value"><?= h($user->name) ?></div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label"><?= __('Email') ?></div>
                            <div class="detail-value"><?= h($user->email) ?></div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label"><?= __('Unit Kerja') ?></div>
                            <div class="detail-value"><?= $user->unit_kerja ? h($user->unit_kerja->name) : __('Not Set') ?></div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label"><?= __('Role') ?></div>
                            <div class="detail-value"><?= $user->role ? h($user->role->name) : __('Not Set') ?></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/listSisfo" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .details {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    padding: 5px 0;
    border-bottom: 1px solid #e0e0e0;
}

.detail-label {
    font-weight: bold;
    flex: 1;
    text-align: left;
}

.detail-value {
    flex: 4;
    text-align: left;
}

</style>