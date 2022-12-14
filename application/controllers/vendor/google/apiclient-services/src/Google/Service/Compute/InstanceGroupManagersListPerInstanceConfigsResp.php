<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_Compute_InstanceGroupManagersListPerInstanceConfigsResp extends Google_Collection
{
  protected $collection_key = 'items';
  protected $itemsType = 'Google_Service_Compute_PerInstanceConfig';
  protected $itemsDataType = 'array';
  public $nextPageToken;
  protected $warningType = 'Google_Service_Compute_InstanceGroupManagersListPerInstanceConfigsRespWarning';
  protected $warningDataType = '';

  /**
   * @param Google_Service_Compute_PerInstanceConfig
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return Google_Service_Compute_PerInstanceConfig
   */
  public function getItems()
  {
    return $this->items;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param Google_Service_Compute_InstanceGroupManagersListPerInstanceConfigsRespWarning
   */
  public function setWarning(Google_Service_Compute_InstanceGroupManagersListPerInstanceConfigsRespWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return Google_Service_Compute_InstanceGroupManagersListPerInstanceConfigsRespWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}
