#!/usr/bin/env bash

commit=$1
if [ -z ${commit} ]; then
    commit=$(git tag | tail -n 1)
    if [ -z ${commit} ]; then
        commit="master";
    fi
fi

# Build new release
mkdir -p FroshAdminer
git archive ${commit} | tar -x -C FroshAdminer
zip -r FroshAdminer-${commit}.zip FroshAdminer