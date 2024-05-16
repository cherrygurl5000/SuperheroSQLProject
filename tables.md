Universe
Universe ID \* (PK) [uniID] -- $heroUni
Universe Name \* (DEFAULT Other) [uniName] -- (Marvel, DC, Other)
Universe Team Name [teamName] (Avengers, Justice League, Flying Solo)

##Group
##Group ID \* (PK) [groupID]
##Group Name \* (DEFAULT Unknown) [groupName]
##Image Location (FK) [imgLoc]

Images
Image ID \* [imgID] auto incrementing
Image Location [imgLoc] -- $heroImg + $heroLogo
Image Description [imgDesc] -- (imgs or logos)
##Universe ID [uniID] -- $heroUni

Hero
Hero ID \* (PK) [heroID] auto incrementing
Hero Name \* [heroName] -- $heroName
Hero Powers \* (DEFAULT NONE) [heroPwr] -- $heroPwr
Hero Abilities \* (DEFAULT NONE) [heroAb] -- $heroAb
Hero Weaknesses \* (DEFAULT NONE) [heroWeak] -- $heroWeak
Hero Enemies \* (DEFAULT NONE) [heroEn] -- $heroEn
Hero Biography \* [heroBio] -- $heroBio
Universe ID (FK) [uniID] -- $heroUni
Image Location (FK) [imgLoc] -- $heroImg
Logo Location [logoLoc] -- $heroLogo
##Group ID (FK) [groupID]

\*-Required
