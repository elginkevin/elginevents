#!/bin/bash
#
#  Author: Kevin Sweeney
#    Date: 23 May 2012
#
#  Script: CreateAll.sh
#
# Purpose: Recreate all objects in database.
#
for tn in TruncateAll Status Type Venue Address VenueAddress User UserAddress Role Category Organization OrganizationAddress UserOrganization Event EventCategory OrganizationCategory EventStatusHistory OrganizationStatusHistory
do
  echo "processing " ${tn}
  mysql elginevents < ${tn}.sql > ../logs/${tn}.out
done
