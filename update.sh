#!/bin/bash

dr="../vendor/drush/drush/drush"
pushd web

$dr sset system.maintenance_mode 1
$dr cr

#drush arb no longer supported
#$dr arb

git pull
if [[ $1 != "" ]]; then
	git checkout $1
fi

cd ..

composer install --no-dev

cd web
$dr cim

$dr sset system.maintenance_mode 0

popd

