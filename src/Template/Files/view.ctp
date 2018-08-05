<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\File $file
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit File'), ['action' => 'edit', $file->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete File'), ['action' => 'delete', $file->id], ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List File Dtls'), ['controller' => 'FileDtls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File Dtl'), ['controller' => 'FileDtls', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="files view large-9 medium-8 columns content">
    <h3><?= h($file->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Candidate Name') ?></th>
            <td><?= h($file->candidate_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File Number') ?></th>
            <td><?= h($file->file_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($file->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($file->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($file->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related File Dtls') ?></h4>
        <?php if (!empty($file->file_dtls)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('File Id') ?></th>
                <th scope="col"><?= __('Path') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($file->file_dtls as $fileDtls): ?>
            <tr>
                <td><?= h($fileDtls->id) ?></td>
                <td><?= h($fileDtls->file_id) ?></td>
                <td><?= h($fileDtls->path) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FileDtls', 'action' => 'view', $fileDtls->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FileDtls', 'action' => 'edit', $fileDtls->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FileDtls', 'action' => 'delete', $fileDtls->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fileDtls->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
