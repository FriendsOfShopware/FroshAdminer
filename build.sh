#!/usr/bin/env bash

commit=$1
if [ -z ${commit} ]; then
    commit=$(git tag | tail -n 1)
    if [ -z ${commit} ]; then
        commit="master";
    fi
fi

# Build new release
mkdir -p Backend/AdminerForShopware
git archive ${commit} | tar -x -C Backend/AdminerForShopware
zip -r AdminerForShopware-${commit}.zip Backend/AdminerForShopware