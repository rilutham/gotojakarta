#include "stlastar.h"
#include <iostream>
#include <string>
#include <vector>
#include <stdio.h>

#define DEBUG_LISTS 0
#define DEBUG_LIST_LENGTHS_ONLY 0

using namespace std;

const int MAX_CITIES = 21;

enum ENUM_CITIES{Garut=0, Jakarta, Tasikmalaya, Ciamis, Banjar, Pangandaran, Sumedang, Bandung, Cimahi, Kuningan, Majalengka, Cirebon, Indramayu, Subang, Karawang, Purwakarta, Cianjur, Sukabumi, Bogor, Depok, Bekasi};
vector<string> CityNames(MAX_CITIES);
float WestJavaMap[MAX_CITIES][MAX_CITIES];

class PathSearchNode
{
public:

  ENUM_CITIES city;

	PathSearchNode() { city = Garut; }
	PathSearchNode( ENUM_CITIES in ) { city = in; }

	float GoalDistanceEstimate( PathSearchNode &nodeGoal );
	bool IsGoal( PathSearchNode &nodeGoal );
	bool GetSuccessors( AStarSearch<PathSearchNode> *astarsearch, PathSearchNode *parent_node );
	float GetCost( PathSearchNode &successor );
	bool IsSameState( PathSearchNode &rhs );

	void PrintNodeInfo();
};

// check if "this" node is the same as "rhs" node
bool PathSearchNode::IsSameState( PathSearchNode &rhs )
{
  if(city == rhs.city) return(true);
  return(false);
}

// Euclidean distance between "this" node city and Jakarta
// Note: Numbers are taken from the book
float PathSearchNode::GoalDistanceEstimate( PathSearchNode &nodeGoal )
{
  // goal is always Jakarta!
  switch(city)
  {
    case Garut: return 165; break;
    case Jakarta: return 0; break;
    case Tasikmalaya: return 201; break;
    case Ciamis: return 212; break;
    case Banjar: return 234; break;
    case Pangandaran: return 265; break;
    case Sumedang: return 141; break;
    case Bandung: return 132; break;
    case Cimahi: return 109; break;
    case Kuningan: return 202; break;
    case Majalengka: return 171; break;
    case Cirebon: return 201; break;
    case Indramayu: return 158; break;
    case Subang: return 111; break;
    case Karawang: return 56; break;
    case Purwakarta: return 81; break;
    case Cianjur: return 78; break;
    case Sukabumi: return 85; break;
    case Bogor: return 36; break;
    case Depok: return 22; break;
    case Bekasi: return 30; break;
  }
  cerr << "ASSERT: city = " << CityNames[city] << endl;
	return 0;
}

// check if "this" node is the goal node
bool PathSearchNode::IsGoal( PathSearchNode &nodeGoal )
{
	if( city == Jakarta ) return(true);
	return(false);
}

// generates the successor nodes of "this" node
bool PathSearchNode::GetSuccessors( AStarSearch<PathSearchNode> *astarsearch, PathSearchNode *parent_node )
{
  PathSearchNode NewNode;
  for(int c=0; c<MAX_CITIES; c++)
  {
    if(WestJavaMap[city][c] < 0) continue;
    NewNode = PathSearchNode((ENUM_CITIES)c);
    astarsearch->AddSuccessor( NewNode );
  }
	return true;
}

// the cost of going from "this" node to the "successor" node
float PathSearchNode::GetCost( PathSearchNode &successor )
{
	return WestJavaMap[city][successor.city];
}

// prints out information about the node
void PathSearchNode::PrintNodeInfo()
{
	cout << " " << CityNames[city] << "\n";
}


// Main Function
int main( int argc, char *argv[] )
{
  // Creating Map of West Java
  for(int i=0; i<MAX_CITIES; i++)
    for(int j=0; j<MAX_CITIES; j++)
      WestJavaMap[i][j]=-1.0;

  // Define distance between two cities 
  // From Plat Z
  WestJavaMap[Pangandaran][Banjar]=63;
  WestJavaMap[Banjar][Ciamis]=26;
  WestJavaMap[Banjar][Kuningan]=83;
  WestJavaMap[Ciamis][Tasikmalaya]=19;
  WestJavaMap[Ciamis][Kuningan]=68;
  WestJavaMap[Tasikmalaya][Garut]=56;
  WestJavaMap[Tasikmalaya][Bandung]=93;
  WestJavaMap[Garut][Bandung]=51;
  WestJavaMap[Sumedang][Bandung]=33;

  // From Plat E
  WestJavaMap[Kuningan][Cirebon]=32;
  WestJavaMap[Kuningan][Majalengka]=58;
  WestJavaMap[Cirebon][Indramayu]=55;
  WestJavaMap[Cirebon][Majalengka]=43;
  WestJavaMap[Majalengka][Sumedang]=47;
  WestJavaMap[Majalengka][Subang]=85;
  WestJavaMap[Indramayu][Karawang]=115;

  // From Plat D
  WestJavaMap[Bandung][Subang]=60;
  WestJavaMap[Bandung][Cimahi]=35;
  WestJavaMap[Cimahi][Purwakarta]=55;
  WestJavaMap[Cimahi][Cianjur]=56;

  // From Plat T
  WestJavaMap[Subang][Purwakarta]=45;
  WestJavaMap[Purwakarta][Karawang]=30;
  WestJavaMap[Karawang][Bekasi]=45;

  // From Plat F
  WestJavaMap[Cianjur][Sukabumi]=30;
  WestJavaMap[Cianjur][Bogor]=69;
  WestJavaMap[Sukabumi][Bogor]=72;
  WestJavaMap[Bogor][Depok]=22;

  // From Plat B
  WestJavaMap[Depok][Jakarta]=26;
  WestJavaMap[Bekasi][Jakarta]=27;

  // City names
  CityNames[Garut].assign("Garut");
  CityNames[Jakarta].assign("Jakarta");
  CityNames[Tasikmalaya].assign("Tasikmalaya");
  CityNames[Ciamis].assign("Ciamis");
  CityNames[Banjar].assign("Banjar");
  CityNames[Pangandaran].assign("Pangandaran");
  CityNames[Sumedang].assign("Sumedang");
  CityNames[Bandung].assign("Bandung");
  CityNames[Cimahi].assign("Cimahi");
  CityNames[Kuningan].assign("Kuningan");
  CityNames[Majalengka].assign("Majalengka");
  CityNames[Cirebon].assign("Cirebon");
  CityNames[Indramayu].assign("Indramayu");
  CityNames[Subang].assign("Subang");
  CityNames[Karawang].assign("Karawang");
  CityNames[Purwakarta].assign("Purwakarta");
  CityNames[Cianjur].assign("Cianjur");
  CityNames[Sukabumi].assign("Sukabumi");
  CityNames[Bogor].assign("Bogor");
  CityNames[Depok].assign("Depok");
  CityNames[Bekasi].assign("Bekasi");

  ENUM_CITIES initCity = Garut;
  if(argc == 2)
  {
    bool found = false;
    for(size_t i=0; i<CityNames.size(); i++)
      if(CityNames[i].compare(argv[1])==0)
      {
        initCity = (ENUM_CITIES)i;
        found = true;
        break;
      }
    if(not found)
    {
      cout << "Kota "<<argv[1]<<" tidak ditemukan pada peta Jawa Barat, silahkan ulangi!\n";
      cout << "Gunakan kapital pada huruf pertama nama kota. Contoh: Garut, Pangandaran.\n";
      return(1);
    }
  }

  // An instance of A* search class
	AStarSearch<PathSearchNode> astarsearch;

	unsigned int SearchCount = 0;
	const unsigned int NumSearches = 1;

	while(SearchCount < NumSearches)
	{
		// Create a start state
		PathSearchNode nodeStart;
		nodeStart.city = initCity;

		// Define the goal state, always Jakarta!
		PathSearchNode nodeEnd;
		nodeEnd.city = Jakarta;

		// Set Start and goal states
		astarsearch.SetStartAndGoalStates( nodeStart, nodeEnd );

		unsigned int SearchState;
		unsigned int SearchSteps = 0;

		do
		{
			SearchState = astarsearch.SearchStep();
			SearchSteps++;

	#if DEBUG_LISTS

			cout << "Steps:" << SearchSteps << "\n";

			int len = 0;

			cout << "Open:\n";
			PathSearchNode *p = astarsearch.GetOpenListStart();
			while( p )
			{
				len++;
	#if !DEBUG_LIST_LENGTHS_ONLY
				((PathSearchNode *)p)->PrintNodeInfo();
	#endif
				p = astarsearch.GetOpenListNext();

			}
			cout << "Open list has " << len << " nodes\n";

			len = 0;

			cout << "Closed:\n";
			p = astarsearch.GetClosedListStart();
			while( p )
			{
				len++;
	#if !DEBUG_LIST_LENGTHS_ONLY
				p->PrintNodeInfo();
	#endif
				p = astarsearch.GetClosedListNext();
			}

			cout << "Closed list has " << len << " nodes\n";
	#endif

		}
		while( SearchState == AStarSearch<PathSearchNode>::SEARCH_STATE_SEARCHING );

		if( SearchState == AStarSearch<PathSearchNode>::SEARCH_STATE_SUCCEEDED )
		{
			cout << "Pencarian rute terpendek menuju Jakarta ditemukan!\n";
      PathSearchNode *node = astarsearch.GetSolutionStart();
      cout << "Berikut kota-kota yang harus dilalui:\n";
      int steps = 0;
      node->PrintNodeInfo();
      for( ;; )
      {
        node = astarsearch.GetSolutionNext();
        if( !node ) break;
        node->PrintNodeInfo();
        steps ++;
      };
      cout << "Langkah Solusi : " << steps << endl;
      // Once you're done with the solution you can free the nodes up
			astarsearch.FreeSolutionNodes();
		}
		else if( SearchState == AStarSearch<PathSearchNode>::SEARCH_STATE_FAILED )
		{
			cout << "Search terminated. Did not find goal state\n";
		}
		// Display the number of loops the search went through
		cout << "Jumlah langkah pencarian : " << SearchSteps << "\n";
		SearchCount ++;
		astarsearch.EnsureMemoryFreed();
	}

	return 0;
}
