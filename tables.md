Universe
Universe ID \* (PK) [uniID]
Universe Name \* (DEFAULT Other) [uniName]

Group
Group ID \* (PK) [groupID]
Group Name \* (DEFAULT Unknown) [groupName]
Image ID (FK) [imgID]

Images
Image ID \* [imgID]
Image Location [imgLoc]

Hero
Hero ID \* (PK) [heroID]
Hero Name \* [heroName]
Hero Powers \* (DEFAULT NONE) [heroPwr]
Hero Abilities \* (DEFAULT NONE) [heroAb]
Hero Weaknesses \* (DEFAULT NONE) [heroWeak]
Hero Enemies \* (DEFAULT NONE) [heroEn]
Hero Biography \* [heroBio]
Universe ID (FK) [uniID]
Image ID (FK) [imgID]
Group ID (FK) [groupID]

\*-Required
