# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

    config.vm.box = "bento/ubuntu-16.04"
    config.vm.network "private_network", ip: "192.168.33.30"

    config.vm.provision "ansible_local" do |ansible|
        ansible.playbook = "vagrant/playbook.yml"
    end

end
