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

/**
 * The "adclients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $adclients = $adexchangesellerService->adclients;
 *  </code>
 */
class Google_Service_AdExchangeSeller_Resource_AccountsAdclients extends Google_Service_Resource
{
  /**
   * List all ad clients in this Ad Exchange account.
   * (adclients.listAccountsAdclients)
   *
   * @param string $accountId Account to which the ad client belongs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of ad clients to include in
   * the response, used for paging.
   * @opt_param string pageToken A continuation token, used to page through ad
   * clients. To retrieve the next page, set this parameter to the value of
   * "nextPageToken" from the previous response.
   * @return Google_Service_AdExchangeSeller_AdClients
   */
  public function listAccountsAdclients($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeSeller_AdClients");
  }
}
