FROM public.ecr.aws/docker/library/alpine:3.23 AS builder

RUN apk add build-base

WORKDIR /tmp/build

COPY ./ls_cracked_files.c ./
RUN cc -o ls_cracked_files ls_cracked_files.c

# ------------------------------------------------------------

FROM public.ecr.aws/docker/library/alpine:3.23 AS app

RUN apk add bash
RUN addgroup -S user && adduser -S user -G user
RUN addgroup -S cracked && adduser -S cracked -G cracked

COPY --chown=cracked:cracked --from=builder /tmp/build/ls_cracked_files /opt/

RUN chmod ugo+x /opt/ls_cracked_files
RUN chmod +s /opt/ls_cracked_files

USER cracked

WORKDIR /home/cracked/scripts

COPY --chown=cracked:cracked ./ls_script.sh ./

RUN chmod -R 733 .
RUN chmod go-w ls_script.sh

WORKDIR /home/cracked/flag

RUN echo "This is the flag. You win." > flag.txt

RUN chmod -R go-rwx .
 
ENTRYPOINT ["/bin/sh"]
CMD ["-c", "while true; do sleep 1d; done"]

WORKDIR /home/user
USER user

