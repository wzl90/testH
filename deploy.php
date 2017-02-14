<?php
namespace Deployer;
require 'recipe/common.php';

task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:vendors',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup'
])->desc('Deploy your project');
after('deploy', 'success');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
 // set('ssh_type', 'native');
 // set('ssh_multiplexing', false);
set('repository', 'git@github.com:wzl90/testH.git');
set('keep_releases', 3);
// Servers

server('production', '118.193.241.202')
    ->user('oipublish')
    ->password('deployer@hk')
    ->set('deploy_path', '/opt/apps/wzl');