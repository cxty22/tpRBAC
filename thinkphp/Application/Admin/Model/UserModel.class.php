<?php
namespace Admin\Model;
use Think\Model\RelationModel;
/**
 * 用户与角色关联模型
 */
class UserModel extends RelationModel {

	//定义主表名称
	protected	$tableName = 'user';

	//定义关联关系
	protected $_link = array(
			'role' => array(
					'mapping_type' => self::MANY_TO_MANY,
					'foreign_key' => 'user_id',
					'relation_key' => 'role_id',
					'relation_table' => 'role_user',
					'mapping_fields' => 'id, name, remark'
				),
		);
}
//select * from user u left join role_user ru on u.id = ru.user_id left join role r on ru.role_id = r.id