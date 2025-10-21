FROM emberstack/sftp:5.1.71-arm64v8

ARG SFTP_USER_DF SFTP_PASSWORD_DF

RUN echo '{"Global":{"Chroot":{"Directory":"%h","StartPath":"sftp"},"Directories":["sftp"],"Logging":{"IgnoreNoIdentificationString":true},"Hooks":{"OnServerStartup":[],"OnSessionChange":[]}},"Users":[{"Username":"'${SFTP_USER_DF}'","Password":"'${SFTP_PASSWORD_DF}'"}]}' > /app/config/sftp.json

RUN id -u 1000 >/dev/null 2>&1 || groupadd -g 1001 ${SFTP_USER_DF} && \
    id -u 1000 >/dev/null 2>&1 || useradd -u 1000 -g 1001 -m -s /bin/bash -N ${SFTP_USER_DF} && \
    chown -R 1000:1001 /home/${SFTP_USER_DF}
