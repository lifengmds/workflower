-- Create syntax for TABLE 'workflow_def'
CREATE TABLE `workflow_def` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `workflow_name` varchar(30) DEFAULT NULL COMMENT '工作流程名称',
  `form_key` varchar(20) DEFAULT NULL COMMENT '表单key',
  `form_name` varchar(20) DEFAULT NULL COMMENT '表单名',
  `memo` int(11) DEFAULT NULL COMMENT '备注',
  `created_by` int(11) DEFAULT '0' COMMENT '创建人',
  `updated_by` int(11) DEFAULT '0' COMMENT '最后更新人',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_creator` (`created_by`),
  KEY `idx_creatime` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Create syntax for TABLE 'workflow_def_process'
CREATE TABLE `workflow_def_process` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `workflow_id` int(30) NOT NULL COMMENT '流程id',
  `process_name` varchar(11) DEFAULT NULL COMMENT '步骤名称',
  `process_index` int(11) DEFAULT NULL COMMENT '进程序号',
  `type` varchar(20) DEFAULT NULL COMMENT '步骤类型：开始 start | 步骤 step|  结束close ',
  `prev_process` int(11) DEFAULT NULL COMMENT '前步骤id',
  `next_process` int(11) DEFAULT NULL COMMENT '后步骤id及条件，如: [role=2]2, [role!=2]3',
  `assignee_user` varchar(20) DEFAULT NULL COMMENT '执行用户',
  `assignee_role` int(11) DEFAULT NULL COMMENT '委托办理的角色（可以是组／部门／岗位）',
  `is_parallel` tinyint(1) DEFAULT '0' COMMENT '是否并行 1, 0',
  `inform` varchar(20) DEFAULT 'app' COMMENT '提醒通知方式 app: 应用消息提醒 | phone：手机短信提醒 | email：邮件提醒',
  `notify` varchar(20) DEFAULT 'app' COMMENT '知会提醒方式  app: 应用消息提醒 | phone：手机短信提醒',
  `notify_user` varchar(10) DEFAULT NULL COMMENT '知会提醒人',
  `notify_role` varchar(10) DEFAULT NULL COMMENT '知会提醒的职位',
  `init_action` varchar(11) DEFAULT NULL,
  `transit_action` varchar(11) DEFAULT NULL,
  `save_action` varchar(11) DEFAULT NULL,
  `max_time` int(11) DEFAULT NULL COMMENT '规定的办理时限（小时）',
  `is_auto` tinyint(11) DEFAULT '0' COMMENT '超过规定的办理时限，是否自动执行。1, 0 ',
  `created_by` int(11) DEFAULT '0',
  `updated_by` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_creator` (`created_by`),
  KEY `idx_creatime` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create syntax for TABLE 'workflow_run'
CREATE TABLE `workflow_run` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `workflow_def_id` int(11) NOT NULL COMMENT '流程定义id',
  `workflow_name` varchar(20) DEFAULT NULL COMMENT '工作流名称',
  `state` varchar(12) DEFAULT NULL COMMENT '状态：待审核 pending | 审核中 processing | 通过 approved | 打回 revoked |  强制结束 closed',
  `created_by` int(11) DEFAULT '0' COMMENT '发起人',
  `updated_by` int(11) DEFAULT '0' COMMENT '最近更新人',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '发起时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '最近更新时间',
  `ended_at` timestamp NULL DEFAULT NULL COMMENT '结束时间',
  `cost_time` time DEFAULT NULL COMMENT '完成时长',
  PRIMARY KEY (`id`),
  KEY `idx_creator` (`created_by`),
  KEY `idx_creatime` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create syntax for TABLE 'workflow_run_process'
CREATE TABLE `workflow_run_process` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `workflow_run_id` int(30) DEFAULT NULL COMMENT '流程实例id',
  `workflow_process_id` int(11) DEFAULT NULL COMMENT '进程id',
  `process_name` varchar(11) DEFAULT NULL COMMENT '步骤名称',
  `process_index` int(11) DEFAULT NULL COMMENT '流程序号',
  `memo` varchar(11) DEFAULT NULL COMMENT '说明',
  `process_state` varchar(12) DEFAULT NULL COMMENT '状态：待审核 pending | 通过 approved |  退回（退回上一步） returned | 撤回 revoked | 打回（退回第一步） refused | 强制结束 closed',
  `is_read` tinyint(1) DEFAULT '0' COMMENT '已读状态：1 已读 0 未读',
  `read_time` timestamp NULL DEFAULT NULL COMMENT '读取时间',
  `executor` int(11) DEFAULT NULL COMMENT '执行任务的人',
  `delegation` int(11) DEFAULT NULL COMMENT '委托人（上一步）',
  `updated_by` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '生成时间',
  `receive_time` timestamp NULL DEFAULT NULL COMMENT '接收时间',
  `updated_at` timestamp NULL DEFAULT NULL,
  `ended_at` timestamp NULL DEFAULT NULL COMMENT '结束时间',
  `deadline` timestamp NULL DEFAULT NULL COMMENT '最后办理期限',
  `cost_time` time DEFAULT NULL COMMENT '花费时长',
  PRIMARY KEY (`id`),
  KEY `idx_creatime` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;