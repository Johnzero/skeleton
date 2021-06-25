<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Constants\Laboratory;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * 组消息事件枚举
 * Class GroupEvent
 * @Constants
 * @package App\Constants\Laboratory
 * @Author YiYuan-Lin
 * @Date: 2021/5/8
 */
class GroupEvent extends AbstractConstants
{
    /**
     * @Message("创建组事件")
     */
    const CREATE_GROUP_EVENT = 'create_group';

    /**
     * @Message("修改群组操作")
     */
    const EDIT_GROUP_EVENT = 'edit_group';

    /**
     * @Message("新加入组员事件")
     */
    const NEW_MEMBER_JOIN_GROUP_EVENT = 'new_member_join_group';

    /**
     * @Message("组员退群事件")
     */
    const GROUP_MEMBER_EXIT_EVENT = 'group_member_exit';

    /**
     * @Message("删除组员事件")
     */
    const DELETE_GROUP_MEMBER_EVENT = 'delete_group_member';

    /**
     * @Message("改变组员等级事件")
     */
    const CHANGE_GROUP_MEMBER_LEVEL_EVENT = 'change_group_member_level';

    /**
     * @Message("解散群聊事件")
     */
    const DELETE_GROUP_EVENT = 'delete_group';

    /**
     * @Message("更新群聊头像")
     */
    const CHANGE_GROUP_AVATAR = 'change_group_avatar';
}
