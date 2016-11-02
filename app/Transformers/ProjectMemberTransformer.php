<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\User;
use League\Fractal\TransformerAbstract;

/**
 * Description of ProjectTransformer
 *
 * @author cau
 */
class ProjectMemberTransformer extends TransformerAbstract 
{
    public function transform(User $member)
    {
        return [
            'member_id' => $member->id,
            'member_name' => $member->name,            
        ];
    }
}
