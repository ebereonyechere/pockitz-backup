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

class Google_Service_RealTimeBidding_PolicyCompliance extends Google_Collection
{
  protected $collection_key = 'topics';
  public $status;
  protected $topicsType = 'Google_Service_RealTimeBidding_PolicyTopicEntry';
  protected $topicsDataType = 'array';

  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param Google_Service_RealTimeBidding_PolicyTopicEntry
   */
  public function setTopics($topics)
  {
    $this->topics = $topics;
  }
  /**
   * @return Google_Service_RealTimeBidding_PolicyTopicEntry
   */
  public function getTopics()
  {
    return $this->topics;
  }
}
