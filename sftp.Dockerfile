FROM emberstack/sftp:5.1.71-arm64v8

ARG SFTP_USER_DF SFTP_PASSWORD_DF

RUN echo '{"Global":{"Chroot":{"Directory":"%h","StartPath":"sftp"},"Directories":["sftp"],"Logging":{"IgnoreNoIdentificationString":true},"Hooks":{"OnServerStartup":[],"OnSessionChange":[]}},"Users":[{"Username":"'${SFTP_USER_DF}'","Password":"'${SFTP_PASSWORD_DF}'"}],"Groups":[{"Name":"demogroup","Users":["demo"],"GID":5000}]}' > /app/config/sftp.json

RUN groupadd -g 1001 ${SFTP_USER_DF} && \
    useradd -u 1000 -g 1001 -s /bin/bash -N -${SFTP_USER_DF} && \
    chown -R 1000:1001 /home/${SFTP_USER_DF}
