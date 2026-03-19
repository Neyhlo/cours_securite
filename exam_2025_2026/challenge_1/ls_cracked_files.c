#include <stdlib.h>
#include <stdio.h>
#include <unistd.h>

int main(int argc, char *argv[])
{
    setreuid(geteuid(), geteuid());
    system("/home/cracked/scripts/ls_script.sh");
}
