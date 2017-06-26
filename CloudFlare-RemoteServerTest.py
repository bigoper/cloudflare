from IPy import IP
import requests
import urllib.request

testSiteURI = "https://cf6.bigoper.com"
cf_IPv6_List = "https://www.cloudflare.com/ips-v6"

try:
    response = urllib.request.urlopen(testSiteURI)
    print(response.getcode())

    if response.getcode() == 200:
        print('Header: Server - {}'.format(response.getheader('Server')))
        print('Header: X-Forwarded-For - {}'.format(response.getheader('X-Forwarded-For')))

        remote_server_ip = response.getheader('X-Forwarded-For')

        try:
            response = requests.get(cf_IPv6_List)
            cf_networks = response.text.split('\n')

            viaCF = "IS NOT"

            for cf_network in cf_networks:
                if len(cf_network) > 1:
                    # get the subnet part of CF Network
                    cf_subnet = cf_network.split("/")[1]

                    # generate a new string to hole the remote_addr and the CF Network
                    remote_server_network_string = '{remote_server_ip}/{cf_subnet}'\
                        .format(remote_server_ip=remote_server_ip, cf_subnet=cf_subnet)

                    # use IP to generate a test network from the remote_addr and CF Network
                    remote_server_network = IP(remote_server_network_string, make_net=True)

                    # use IP go generate real IP Network for both properties
                    str_cf_net = IP(cf_network, make_net=True).strNormal().replace("/", "_")
                    str_rm_net = remote_server_network.strNormal().replace("/", "_")

                    # display them (debugging)
                    print("CF NETWORK:      {}".format(str_cf_net))
                    print("REMOTE NETWORK:  {}".format(str_rm_net))

                    # Compare the two networks.
                    # If True, the reflection of CF Network range on the
                    # remote_addr is a match to the tested network
                    if str_cf_net == str_rm_net:
                        viaCF = "IS"
                        break

            print('Current website {} being served by CloudFlare'.format(viaCF))

        except OSError as e:
            print("error happened: {}".format(e))

    else:
        print('The response code was not 200, but: {}'.format(
            response.get_code()))

except urllib.error.HTTPError as e:
    print('''An error occurred: {}
        The response code was {}'''.format(e, e.getcode()))

