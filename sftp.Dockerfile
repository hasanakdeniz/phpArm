FROM emberstack/sftp:5.1.71-arm64v8

RUN echo '{"Global":{"Chroot":{"Directory":"%h","StartPath":"sftp"},"Directories":["sftp"],"Logging":{"IgnoreNoIdentificationString":true},"Hooks":{"OnServerStartup":[],"OnSessionChange":[]}},"Users":[{"Username":"demo1","Password":"demo"}],"Groups":[{"Name":"demogroup","Users":["demo"],"GID":5000}]}' > /app/config/sftp.json

EXPOSE 24
