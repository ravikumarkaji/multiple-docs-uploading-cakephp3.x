<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FileDtl Entity
 *
 * @property int $id
 * @property int $file_id
 * @property string $doc_name
 * @property string $doc_path
 *
 * @property \App\Model\Entity\File $file
 */
class FileDtl extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'file_id' => true,
        'doc_name' => true,
        'doc_path' => true,
        'file' => true
    ];
}
